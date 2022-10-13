<?php

namespace App\Service;
use App\Entity\Ingridient;
use App\Repository\IngridientRepository;

class IngridientsService
{
    private $repository;

    public function __construct(IngridientRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($ingridient)
    {
        $this->repository->save($ingridient);
    }

    function update($ingridient)
    {
        $this->repository->update($ingridient);
    }

    function delete($ingridient)
    {
        $this->repository->delete($ingridient);
    }

    function findAll()
    {
        $ingridients = $this->repository->findAll();
        return $ingridients;
    }
}