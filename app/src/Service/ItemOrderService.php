<?php

namespace App\Service;
use App\Entity\ItemOrder;
use App\Repository\ItemOrderRepository;


class ItemOrderService
{
    private $repository;

    public function  __construct(ItemOrderRepository $repository)
    {
        $this->repository = $repository;
    }


    function save($itemOrder): void
    {
        $this->repository->save($itemOrder);
    }

    function update(ItemOrder $itemOrder): void
    {
        $this->repository->update($itemOrder);
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
        return $this->repository->findItemOrderIdStatus();
    }
}