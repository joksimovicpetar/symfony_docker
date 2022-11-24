<?php

namespace App\Service;

use App\Repository\SizeRepository;

class SizeService
{
    private $repository;

    public function __construct(SizeRepository $repository, ItemOrderService $itemOrderService)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
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

    function findSizes()
    {
        return $this->repository->findSizes();
    }

    function find($id){
        return $this->repository->find($id);
    }

    function updateSize($dataObject){
        $size = $this->find($dataObject->getId());
        $current = $this->itemOrderService->findItemOrderIdStatus();

        $current->setSize($size);
        if ($current->getOrderStep()<=2)
        {
            $current->setOrderStep(2);
        }
        $this->itemOrderService->save($current);
    }
}