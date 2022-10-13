<?php

namespace App\Service;
use App\Repository\BowlRepository;

class BowlService
{

    private $repository;

    public function  __construct(BowlRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($bowl)
    {
        $this->repository->save($bowl);
    }

    function update($bowl)
    {
        $this->repository->update($bowl);
    }

    function delete($bowl)
    {
        $this->repository->delete($bowl);
    }

    function findAll()
    {
        $bowls = $this->repository->findAll();
        return $bowls;
    }

}