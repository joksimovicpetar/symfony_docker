<?php

namespace App\Service;
use App\Entity\Bowl;
use App\Repository\BowlRepository;

class BowlService
{


    private $repository;

    public function  __construct(BowlRepository $repository)
    {
        $this->repository = $repository;
    }


    function save(Bowl $bowl): void
    {
        $this->repository->save($bowl);
    }

    function update(Bowl $bowl): void
    {
        $this->repository->update($bowl);
    }

    function delete(Bowl $bowl): void
    {
        $this->repository->delete($bowl);
    }

    function findAll()
    {
        $bowls = $this->repository->findAll();
        return $bowls;
    }

    function findBowls(){
        $bowls = $this->findBowls();
    }

}