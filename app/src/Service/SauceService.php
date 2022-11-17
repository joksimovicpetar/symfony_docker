<?php

namespace App\Service;

use App\Repository\SauceRepository;

class SauceService
{
    private $repository;

    public function  __construct(SauceRepository $repository, ItemOrderService $itemOrderService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
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

    function updateSauce($parameters){
        $sauce = $this->find($parameters['valueId']);
        $current = $this->itemOrderService->findItemOrderIdStatus();

        $current->setSauce($sauce);
        if ($current->getOrderStep()<=4)
        {
            $current->setOrderStep(4);
        }
        $this->itemOrderService->save($current);
    }

}