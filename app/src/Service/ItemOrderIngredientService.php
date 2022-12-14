<?php

namespace App\Service;

use App\Entity\ItemOrderIngredient;
use App\Repository\ItemOrderIngredientRepository;
use Symfony\Component\VarDumper\VarDumper;

class ItemOrderIngredientService
{
    private $repository;

    public function  __construct(ItemOrderIngredientRepository $repository, ItemOrderService $itemOrderService,  IngredientService $ingredientService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->ingredientService = $ingredientService;
    }


    function save($itemOrderIngredient): void
    {
        $this->repository->save($itemOrderIngredient);
    }

    function deleteOnId(): void
    {
        $current = $this->itemOrderService->findItemOrderIdStatus();
        $itemOrderIngredients = $this->findItemOrderIngredient();

        foreach ($itemOrderIngredients as $itemOrderIngredient){
            if ($itemOrderIngredient->getItemOrder()->getId() == $current->getId()){
                $this->repository->delete($itemOrderIngredient);
            }
        }
    }

    function findAll()
    {
        $itemOrderIngredients = $this->repository->findAll();
        return $itemOrderIngredients;
    }

    function findItemOrderIngredient(){

        return $this->repository->findItemOrderIngredient();

    }

    function find($id){
        return $this->repository->find($id);
    }

    public function update($dataObjectCollection)
    {
        foreach ($dataObjectCollection->getDataObjects() as $dataObject) {
            $ingredient = $this->ingredientService->find($dataObject->getId());
            $current = $this->itemOrderService->findItemOrderIdStatus();
            $itemOrderIngredient = new ItemOrderIngredient($current,$ingredient);
            if ($current->getOrderStep()<=5)
            {
                $current->setOrderStep(5);
            }
            $this->save($itemOrderIngredient);
        }
    }
}