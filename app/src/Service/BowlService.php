<?php

namespace App\Service;
use App\Entity\Bowl;
use App\Entity\ItemOrder;
use App\Entity\UserOrder;
use App\Repository\BowlRepository;
use App\Repository\UserOrderRepository;


class BowlService
{


    private $repository;

    public function  __construct(BowlRepository $repository, ItemOrderService $itemOrderService, UserOrderService $userOrderService, UserOrderRepository $userOrderRepository)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->userOrderService = $userOrderService;
        $this->userOrderRepository = $userOrderRepository;
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

    function findBowls()
    {
        return $this->repository->findBowls();
    }

    function find($id)
    {
        return $this->repository->find($id);
    }

    function updateBowl($parameters)
    {
        $bowl = $this->find($parameters['valueId']);
        $current = $this->itemOrderService->findItemOrderIdStatus();
        $currentUserOrder = $this->userOrderService->findLastUserOrder();

        if ($current == null || $current->getOrderStep()==6) {
            $itemOrder = new ItemOrder();
            $itemOrder->setBowl($bowl);
            $itemOrder->setOrderStep(1);
            $itemOrder->setQuantity(1);
            if($currentUserOrder->getStatus()=='completed'){
                $userOrder = new UserOrder();
                $userOrder->setStatus('in_progress');
                $this->userOrderRepository->save($userOrder);
                $itemOrder->setUserOrder($userOrder);
                $this->itemOrderService->save($itemOrder);
            } else {
                $itemOrder->setUserOrder($currentUserOrder);
                $this->itemOrderService->save($itemOrder);
            }

        } else {
            $current->setBowl($bowl);
            if ($current->getOrderStep()<=1)
            {
                $current->setOrderStep(1);
            }
            $this->itemOrderService->save($current);
        }
    }


}