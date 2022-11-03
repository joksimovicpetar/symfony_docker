<?php

namespace App\Service;
use App\Entity\ItemOrderExtraIngredient;
use App\Repository\ItemOrderExtraIngredientRepository;
use Symfony\Component\VarDumper\VarDumper;

class ItemOrderExtraIngredientService
{
    private $repository;

    public function  __construct(ItemOrderExtraIngredientRepository $repository, ItemOrderService $itemOrderService, ExtraIngredientService $extraIngredientService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->extraIngredientService = $extraIngredientService;
    }


    function save($itemOrderExtraIngredient): void
    {
        $this->repository->save($itemOrderExtraIngredient);
    }

    function deleteOnId(): void
    {
        $current = $this->itemOrderService->findItemOrderIdStatus();
        $itemOrderExtraIngredients = $this->findItemOrderExtraIngredient();

        foreach ($itemOrderExtraIngredients as $itemOrderExtraIngredient){
            if ($itemOrderExtraIngredient->getItemOrder()->getId() == $current->getId()){
                $this->repository->delete($itemOrderExtraIngredient);
            }
        }
    }

    function findAll()
    {
        $itemOrderExtraIngredient = $this->repository->findAll();
        return $itemOrderExtraIngredient;
    }

    function findItemOrderExtraIngredient(){
        return $this->repository->findItemOrderExtraIngredient();
    }

    function findLastItemOrderExtraIngredient(){
        return $this->repository->findLastItemOrderExtraIngredient();
    }

    function find($id){
        return $this->repository->find($id);
    }

    public function update($parameters)
    {
        $extraIngredientsId = $parameters['valueId'];
        foreach ($extraIngredientsId as $extraIngredientId) {
            $extraIngredient = $this->extraIngredientService->find($extraIngredientId);
            $current = $this->itemOrderService->findItemOrderIdStatus();
            $itemOrderExtraIngredient = new ItemOrderExtraIngredient($current,$extraIngredient);
            $current->setOrderStep(6);
            $this->save($itemOrderExtraIngredient);

        }
        $total = $this->priceCalculator($current);
        $current->setPrice($total);
        $current->setTotalPrice($total*$current->getQuantity());
        $this->itemOrderService->save($current);
    }

    function priceCalculator($current): float
    {
        $sum = 0.0;
        $itemOrderExtraIngredients = $this->findItemOrderExtraIngredient();

//        VarDumper::dump($sum);exit;
        foreach ($itemOrderExtraIngredients as $itemOrderExtraIngredient)
        {
            if ($itemOrderExtraIngredient->getItemOrder()->getId() == $current->getId())
            {
                $sum = $sum + $itemOrderExtraIngredient->getExtraIngredient()->getPrice();
            }
        }
        $sum = $sum + $current->getSize()->getPrice();
//        VarDumper::dump($sum);exit;
        return $sum;
    }
}