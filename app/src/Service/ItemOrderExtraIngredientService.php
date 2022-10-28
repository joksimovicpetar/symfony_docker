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


    function save($itemOrderExtraIngredient): void
    {
        $this->repository->save($itemOrderExtraIngredient);
    }

    function deleteOnId(ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ItemOrderService $service): void
    {
        $this->repository->deleteOnId($itemOrderExtraIngredientService, $service);
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

    function updateExtraIngredient($extraIngredientId, ItemOrderService $service, ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ExtraIngredientService $extraIngredientService)
    {
        $this->repository->updateExtraIngredient($extraIngredientId, $service, $itemOrderExtraIngredientService, $extraIngredientService);
    }

    public function update($parameters,ItemOrderExtraIngredientService $itemOrderExtraIngredientService, ItemOrderService $service, ExtraIngredientService $extraIngredientService)
    {
        $this->repository->update($parameters,  $itemOrderExtraIngredientService,  $service,  $extraIngredientService);
    }
}