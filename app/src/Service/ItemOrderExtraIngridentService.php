<?php

namespace App\Service;
use App\Repository\ItemOrderExtraIngridientRepository;

class ItemOrderExtraIngridentService
{
    private $repository;

    public function  __construct(ItemOrderExtraIngridientRepository $repository)
    {
        $this->repository = $repository;
    }


    function save(ItemOrderExtraIngridientRepository $itemOrderExtraIngridient): void
    {
        $this->repository->save($itemOrderExtraIngridient);
    }

    function update(ItemOrderExtraIngridientRepository $itemOrderExtraIngridient): void
    {
        $this->repository->update($itemOrderExtraIngridient);
    }

    function delete(ItemOrderExtraIngridientRepository $itemOrderExtraIngridient): void
    {
        $this->repository->delete($itemOrderExtraIngridient);
    }

    function findAll()
    {
        $itemOrderExtraIngridient = $this->repository->findAll();
        return $itemOrderExtraIngridient;
    }

    function findItemOrderExtraIngridient(){

        return $this->repository->findItemOrderExtraIngridient();

    }
}