<?php

namespace App\Service;
use App\Repository\ExtraIngredientRepository;

class ExtraIngredientService
{
    private $repository;

    public function __construct(ExtraIngredientRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($extraIngredient)
    {
        $this->repository->save($extraIngredient);
    }

    function update($extraIngredient)
    {
        $this->repository->update($extraIngredient);
    }

    function delete($extraIngredient)
    {
        $this->repository->delete($extraIngredient);
    }

    function findAll()
    {
        $extraIngredients = $this->repository->findAll();
        return $extraIngredients;
    }

    function findExtraIngredients()
    {
        return $this->repository->findExtraIngredients();
    }

    function find($id){
        return $this->repository->find($id);
    }

}