<?php

namespace App\Service;

use App\Entity\ItemOrder;
use App\Repository\UserOrderRepository;

class UserOrderService
{
    private $repository;

    public function __construct(UserOrderRepository $repository, ItemOrderService $itemOrderService, ItemOrderExtraIngredientService $itemOrderExtraIngredientService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->itemOrderExtraIngredientService = $itemOrderExtraIngredientService;
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

    function findLastUserOrder(){
        return $this->repository->findLastUserOrder();
    }

    function findPrice(ItemOrder $itemOrder) : float
    {
        $sum = $itemOrder->getSize()->getPrice();
        $extraIngredientsList = $this->itemOrderExtraIngredientService->findItemOrderExtraIngredient();

        foreach ($extraIngredientsList as $extraIngredient)
        {
            if ($extraIngredient->getItemOrder()->getId() == $itemOrder->getId()){
                $sum += $extraIngredient->getExtraIngredient()->getPrice();
            }
        }
        return $sum;
    }

}