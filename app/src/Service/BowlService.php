<?php

namespace App\Service;
use App\Entity\Bowl;
use App\Entity\ItemOrder;
use App\Entity\UserOrder;
use App\Repository\BowlRepository;
use App\Repository\UserOrderRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;


class BowlService
{


    private BowlRepository $repository;
    private ItemOrderService $itemOrderService;
    private UserOrderService $userOrderService;
    private UserOrderRepository $userOrderRepository;
    private Security $security;

    public function  __construct(BowlRepository $repository, ItemOrderService $itemOrderService, UserOrderService $userOrderService, UserOrderRepository $userOrderRepository, Security $security)
    {
        $this->repository = $repository;
        $this->itemOrderService = $itemOrderService;
        $this->userOrderService = $userOrderService;
        $this->userOrderRepository = $userOrderRepository;
        $this->security = $security;
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

    function updateBowl($dataObject)
    {
        $bowl = $this->find($dataObject->getID());
        $currentUserOrder = $this->userOrderService->findLastUserOrder();
        $current = $this->itemOrderService->findItemOrderIdStatus();

        if ($current == null || $current->getOrderStep()==6) {
            $itemOrder = new ItemOrder();
            $itemOrder->setBowl($bowl);
            $itemOrder->setOrderStep(1);
            $itemOrder->setQuantity(1);

            if ($currentUserOrder == null){
                $userOrder = new UserOrder();
                $userOrder->setStatus('in_progress');
                $user = $this->security->getUser();
                $userOrder->setUser($user);
                $this->userOrderRepository->save($userOrder);
                $itemOrder->setUserOrder($userOrder);
                $this->itemOrderService->save($itemOrder);
            } elseif ($currentUserOrder->getStatus()=='completed'){
                    $userOrder = new UserOrder();
                    $userOrder->setStatus('in_progress');
                    $user = $this->security->getUser();
                    $userOrder->setUser($user);
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