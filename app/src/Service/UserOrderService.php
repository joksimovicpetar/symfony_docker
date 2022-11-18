<?php

namespace App\Service;

use App\Entity\ItemOrder;
use App\Repository\UserOrderRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\VarDumper\VarDumper;

class UserOrderService
{
    private $repository;
    private $requestStack;

    public function __construct(UserOrderRepository $repository, ItemOrderService $itemOrderService, ItemOrderExtraIngredientService $itemOrderExtraIngredientService, RequestStack $requestStack)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->itemOrderExtraIngredientService = $itemOrderExtraIngredientService;
        $this->requestStack = $requestStack;

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

    function findUserOrderPrice()
    {
        $session = $this->requestStack->getSession();
        $userOrder = $this->findUserOrders();
        $itemOrders = $userOrder->getItemOrders()->getValues();
        $sum = 0;
        foreach ($itemOrders as $itemOrder) {
        $sum += $itemOrder->getTotalPrice();
        }
        return $sum;
    }
}