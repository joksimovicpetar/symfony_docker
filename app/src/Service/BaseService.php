<?php

namespace App\Service;
use App\Repository\BaseRepository;

class BaseService
{
    private $repository;

    public function  __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }


    function save(Base $base): void
    {
        $this->repository->save($base);
    }

    function update(Base $base): void
    {
        $this->repository->update($base);
    }

    function delete(Base $base): void
    {
        $this->repository->delete($base);
    }

    function findAll()
    {
        $bases = $this->repository->findAll();
        return $bases;
    }

    function findBases(){
        return $this->repository->findBases();

    }
}