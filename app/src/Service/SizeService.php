<?php

namespace App\Service;
use App\Entity\Size;
use App\Repository\SizeRepository;

class SizeService
{
    private $repository;

    public function __construct(SizeRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($size)
    {
        $this->repository->save($size);
    }

    function update($size)
    {
        $this->repository->update($size);
    }

    function delete($size)
    {
        $this->repository->delete($size);
    }

    function findAll()
    {
        $sizes = $this->repository->findAll();
        return $sizes;
    }
}