<?php

namespace App\Service;



use App\Entity\OrderInfo;
use App\Entity\UserOrder;
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

    function save($parameters)
    {

        $fullName = $parameters['fullName'];
        $address = $parameters['address'];
        $phoneNumber = $parameters['phoneNumber'];
        $time = $parameters['time'];
        $payment = $parameters['payment'];
        $date = $parameters['date'];
        $note = $parameters['note'];
        $currentUserOrder = $this->userOrderService->findLastUserOrder();

        $orderInfo = new OrderInfo();
        $orderInfo->setFullName($fullName);
        $orderInfo->setAddress($address);
        $orderInfo->setPhoneNumber($phoneNumber);
        $orderInfo->setDeliveryTime($time);
        $orderInfo->setPayment($payment);
        $orderInfo->setOrderDate($date);
        $orderInfo->setNote($note);
        $orderInfo->setUserOrderId($currentUserOrder);

        $this->repository->save($orderInfo);
//        $userOrder = new UserOrder();
//        $this->userOrderRepository->save($userOrder);
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