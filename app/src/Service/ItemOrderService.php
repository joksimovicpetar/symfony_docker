<?php

namespace App\Service;

use App\Entity\ItemOrder;
use App\EventListener\QuantityChangeEvent;
use App\Repository\ItemOrderRepository;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;


class ItemOrderService
{
    private $repository;
    private UserOrderService $userOrderService;
    private EventDispatcherInterface $eventDispatcher;

    public function  __construct(ItemOrderRepository $repository, Security $security, EventDispatcherInterface $eventDispatcher)
    {
        $this->repository = $repository;
        $this->security = $security;
        $this->eventDispatcher = $eventDispatcher;
    }


    function save($itemOrder): void
    {
        $this->repository->save($itemOrder);
    }

    function update($dataObjectQuantity): void
    {
        $quantityAfter = $dataObjectQuantity->getQuantity();
        $itemOrderId = $dataObjectQuantity->getId();
        $itemOrder = $this->find($itemOrderId);
        $quantityBefore = $itemOrder->getQuantity();
        $itemOrder->setQuantity($quantityAfter);
        $itemOrder->setTotalPrice($itemOrder->getPrice()*$itemOrder->getQuantity());
        $this->save($itemOrder);
        $this->dispatchEvent($dataObjectQuantity, $quantityBefore, $quantityAfter);
    }

    function dispatchEvent($dataObjectQuantity, $quantityBefore,$quantityAfter){
        $itemOrder = $this->find($dataObjectQuantity->getId());
        $quantity = [
            'before'=>$quantityBefore,
            'after'=>$quantityAfter];
        $event = new QuantityChangeEvent($itemOrder, $quantity);
        $this->eventDispatcher->dispatch($event);
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