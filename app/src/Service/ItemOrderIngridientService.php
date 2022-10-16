<?php

namespace App\Service;
use App\Repository\ItemOrderIngridientRepository;

class ItemOrderIngridientService
{
    private $repository;

    public function  __construct(ItemOrderIngridientRepository $repository)
    {
        $this->repository = $repository;
    }


    function save(ItemOrderIngridient $itemOrderIngridient): void
    {
        $this->repository->save($itemOrderIngridient);
    }

    function update(ItemOrderIngridientRepository $itemOrderIngridient): void
    {
        $this->repository->update($itemOrderIngridient);
    }

    function delete(ItemOrderIngridientRepository $itemOrderIngridient): void
    {
        $this->repository->delete($itemOrderIngridient);
    }

    function findAll()
    {
        $itemOrderIngridients = $this->repository->findAll();
        return $itemOrderIngridients;
    }

    function findItemOrderIngridient(){

        return $this->repository->findItemOrderIngridient();

    }
}