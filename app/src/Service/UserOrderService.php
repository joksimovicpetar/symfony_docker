<?php

namespace App\Service;

use App\Entity\UserOrder;
use App\Repository\UserOrderRepository;

class UserOrderService
{
    private $repository;

    public function __construct(UserOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($userOrder)
    {
        $this->repository->save($userOrder);
    }

    function update($userOrder)
    {
        $this->repository->update($userOrder);
    }

    function delete($userOrder)
    {
        $this->repository->delete($userOrder);
    }

    function findAll()
    {
        $userOrders = $this->repository->findAll();
        return $userOrders;
    }

    function findUserOrders(){
        return $this->repository->findUserOrders();
    }

    function find($id){
        return $this->repository->find($id);
    }

}