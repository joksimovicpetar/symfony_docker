<?php

namespace App\Service;
use App\Repository\BaseRepository;

class BaseService
{
    private $repository;

    public function  __construct(BaseRepository $repository,ItemOrderService $itemOrderService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
    }


    function save( $base): void
    {
        $this->repository->save($base);
    }

    function update( $base): void
    {
        $this->repository->update($base);
    }

    function delete( $base): void
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

    function find($id){
        return $this->repository->find($id);
    }

    function updateBase($parameters){
        $base = $this->find($parameters['valueId']);
        $current = $this->itemOrderService->findItemOrderIdStatus();

        $current->setBase($base);
        if ($current->getOrderStep()<=3)
        {
            $current->setOrderStep(3);
        }
        $this->itemOrderService->save($current);
    }
}