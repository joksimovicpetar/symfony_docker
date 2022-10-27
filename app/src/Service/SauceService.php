<?php

namespace App\Service;
use App\Entity\Sauce;
use App\Repository\SauceRepository;

class SauceService
{
    private $repository;

    public function  __construct(SauceRepository $repository)
    {
        $this->repository = $repository;
    }

    function save($sauce)
    {
        $this->repository->save($sauce);
    }

    function update($sauce)
    {
        $this->repository->update($sauce);
    }

    function delete($sauce)
    {
        $this->repository->delete($sauce);
    }

    function findAll()
    {
        $sauces = $this->repository->findAll();
        return $sauces;
    }

    function findSauces()
    {
        return $this->repository->findSauces();
    }

    function find($id){
        return $this->repository->find($id);
    }

    function updateSauce($parameters, ItemOrderService $service, SauceService $sauceService){
        $this->repository->updateSauce($parameters, $service, $sauceService);
    }

}