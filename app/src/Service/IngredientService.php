<?php

namespace App\Service;
use App\Entity\Ingredient;
use App\Repository\IngredientRepository;

class IngredientService
{
    private $repository;

    public function __construct(IngredientRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($ingredient)
    {
        $this->repository->save($ingredient);
    }

    function update($ingredient)
    {
        $this->repository->update($ingredient);
    }

    function delete($ingredient)
    {
        $this->repository->delete($ingredient);
    }

    function findAll()
    {
        $ingredients = $this->repository->findAll();
        return $ingredients;
    }

    function findIngredients(){
        return $this->repository->findIngredients();

    }
}