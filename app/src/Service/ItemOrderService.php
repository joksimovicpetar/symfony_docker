<?php

namespace App\Service;
use App\Entity\ItemOrder;
use App\Repository\ItemOrderRepository;
use Symfony\Component\VarDumper\VarDumper;


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

    function update($parameters, $multiplier,ItemOrderExtraIngredientService $itemOrderExtraIngredientService): void
    {
        $itemOrderId = $parameters['valueId'];
        $itemOrder = $this->find($itemOrderId);
        $itemOrderExtraIngredients = $itemOrderExtraIngredientService->findItemOrderExtraIngredient();
        $itemOrder->getSize()->setPrice($itemOrder->getSize()->getPrice()*$multiplier);

        foreach ($itemOrderExtraIngredients as $itemOrderExtraIngredient)
        {
            if ($itemOrderExtraIngredient->getItemOrder()->getId()==$itemOrder->getId())
            {
                $itemOrderExtraIngredient->getExtraIngredient()->setPrice($itemOrderExtraIngredient->getExtraIngredient()->getPrice()*$multiplier);
            }
        }
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

    function find($id){
        return $this->repository->find($id);
    }

}