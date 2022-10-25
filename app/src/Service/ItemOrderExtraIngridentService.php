<?php

namespace App\Service;
use App\Repository\ItemOrderExtraIngredientRepository;

class ItemOrderExtraIngridentService
{
    private $repository;

    public function  __construct(ItemOrderExtraIngredientRepository $repository)
    {
        $this->repository = $repository;
    }


    function save(ItemOrderExtraIngredientRepository $itemOrderExtraIngredient): void
    {
        $this->repository->save($itemOrderExtraIngredient);
    }

    function update(ItemOrderExtraIngredientRepository $itemOrderExtraIngredient): void
    {
        $this->repository->update($itemOrderExtraIngredient);
    }

    function delete(ItemOrderExtraIngredientRepository $itemOrderExtraIngredient): void
    {
        $this->repository->delete($itemOrderExtraIngredient);
    }

    function findAll()
    {
        $itemOrderExtraIngredient = $this->repository->findAll();
        return $itemOrderExtraIngredient;
    }

    function findItemOrderExtraIngredient(){

        return $this->repository->findItemOrderExtraIngredient();

    }
}