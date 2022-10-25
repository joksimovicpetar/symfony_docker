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


    function save(ItemOrderIngredient $itemOrderIngredient): void
    {
        $this->repository->save($itemOrderIngredient);
    }

    function update(ItemOrderIngredientRepository $itemOrderIngredient): void
    {
        $this->repository->update($itemOrderIngredient);
    }

    function delete(ItemOrderIngredientRepository $itemOrderIngredient): void
    {
        $this->repository->delete($itemOrderIngredient);
    }

    function findAll()
    {
        $itemOrderIngredients = $this->repository->findAll();
        return $itemOrderIngredients;
    }

    function findItemOrderIngredient(){

        return $this->repository->findItemOrderIngredient();

    }
}