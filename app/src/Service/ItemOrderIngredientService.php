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

    function deleteOnId(ItemOrderIngredientService $itemOrderIngredientService, ItemOrderService $service): void
    {
        $this->repository->deleteOnId($itemOrderIngredientService, $service);
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
        $this->repository->updateIngredient($ingredientId, $service, $itemOrderIngredientService, $ingredientService);
    }

    public function update($parameters,ItemOrderIngredientService $itemOrderIngredientService, ItemOrderService $service, IngredientService $ingredientService)
    {
        $this->repository->update($parameters,  $itemOrderIngredientService,  $service,  $ingredientService);
    }
}