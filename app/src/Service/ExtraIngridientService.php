<?php

namespace App\Service;
use App\Repository\ExtraIngridientRepository;

class ExtraIngridientService
{
    private $repository;

    public function __construct(ExtraIngridientRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($extraIngridient)
    {
        $this->repository->save($extraIngridient);
    }

    function update($extraIngridient)
    {
        $this->repository->update($extraIngridient);
    }

    function delete($extraIngridient)
    {
        $this->repository->delete($extraIngridient);
    }

    function findAll()
    {
        $extraIngridients = $this->repository->findAll();
        return $extraIngridients;
    }
}