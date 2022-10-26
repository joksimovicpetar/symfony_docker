<?php

namespace App\Service;
use App\Repository\ItemOrderExtraIngredientRepository;

class ItemOrderExtraIngredientService
{
    private $repository;

    public function  __construct(ItemOrderExtraIngredientRepository $repository)
    {
        $this->repository = $repository;
    }


    function save( $itemOrderExtraIngredient): void
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

    function findLastItemOrderExtraIngredient(){
        return $this->repository->findLastItemOrderExtraIngredient();
    }

    function find($id){
        return $this->repository->find($id);
    }

    function updateExtraIngredient($param, ItemOrderService $service, ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ExtraIngredientService $extraIngredientService)
    {
        return $this->repository->updateExtraIngredient($param, $service, $itemOrderExtraIngredientService, $extraIngredientService);
    }
}