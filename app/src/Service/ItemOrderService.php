<?php

namespace App\Service;

use App\Entity\ItemOrder;
use App\Repository\ItemOrderRepository;
use Symfony\Component\Security\Core\Security;


class ItemOrderService
{
    private $repository;

    public function  __construct(ItemOrderRepository $repository, Security $security)
    {
        $this->repository = $repository;
        $this->security = $security;
    }


    function save($itemOrder): void
    {
        $this->repository->save($itemOrder);
    }

    function update($dataObjectQuantity): void
    {
        $quantity = $dataObjectQuantity->getQuantity();
        $itemOrderId = $dataObjectQuantity->getId();
        $itemOrder = $this->find($itemOrderId);
        $itemOrder->setQuantity($quantity);
        $itemOrder->setTotalPrice($itemOrder->getPrice()*$itemOrder->getQuantity());
        $this->save($itemOrder);
    }

    function delete(ItemOrder $itemOrder): void
    {
        $this->repository->delete($itemOrder);
    }

    function findAll()
    {
        $itemOrders = $this->repository->findAll();
        return $itemOrders;
    }

    function findItemOrderIdStatus()
    {
        $token = $this->security->getToken();
        $user = $token ? $token->getUser() : null;
        if (!$user) return null;
        $userIdentifier = $user->getId();
        return $this->repository->findItemOrderIdStatus($userIdentifier);
    }

    function find($id){
        return $this->repository->find($id);
    }



}