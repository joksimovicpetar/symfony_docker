<?php

namespace App\Service;
use App\Repository\ItemOrderIngredientRepository;

class ItemOrderIngredientService
{
    private $repository;

    public function  __construct(ItemOrderIngredientRepository $repository)
    {
        $this->repository = $repository;
    }


    function save($itemOrderIngredient): void
    {
        $this->repository->save($itemOrderIngredient);
    }

    function update(ItemOrderIngredientRepository $itemOrderIngredient): void
    {
        $this->repository->update($itemOrderIngredient);
    }

    function deleteOnId($id, ItemOrderIngredientService $itemOrderIngredientService): void
    {
        $this->repository->deleteOnId($id, $itemOrderIngredientService);
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

    function updateIngredient($ingredientId, ItemOrderService $service, ItemOrderIngredientService $itemOrderIngredientService, IngredientService $ingredientService)
    {
        return $this->repository->updateIngredient($ingredientId, $service, $itemOrderIngredientService, $ingredientService);
    }
}