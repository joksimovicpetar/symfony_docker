<?php

namespace App\Service;

use App\Factory\OrderInfoFactory;
use App\Repository\OrderInfoRepository;
use App\Repository\UserOrderRepository;

class CheckoutService
{
    private $repository;

    public function __construct(OrderInfoRepository $repository, UserOrderService $userOrderService, UserOrderRepository $userOrderRepository)
    {
        $this->repository = $repository;
        $this->userOrderService = $userOrderService;
        $this->userOrderRepository = $userOrderRepository;
    }

    function save($dataObjectOrderInfo)
    {
        $orderInfo = OrderInfoFactory::orderInfoFromParams($dataObjectOrderInfo);
        $currentUserOrder = $this->userOrderService->findLastUserOrder();
        $id = $currentUserOrder->getId();

        $orderInfo->setUserOrderId($currentUserOrder);

        $this->repository->save($orderInfo);
        $this->userOrderRepository->find($id)->setStatus('completed');
        $this->userOrderRepository->save($currentUserOrder);

    }

    function update($userOrder)
    {
        $this->repository->update($userOrder);
    }

    function delete($userOrder)
    {
        $this->repository->delete($userOrder);
    }

    function find($id){
        return $this->repository->find($id);
    }

}