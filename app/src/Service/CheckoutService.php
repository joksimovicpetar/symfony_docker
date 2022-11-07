<?php

namespace App\Service;



use App\Entity\OrderInfo;
use App\Repository\OrderInfoRepository;

class CheckoutService
{
    private $repository;

    public function __construct(OrderInfoRepository $repository, UserOrderService $userOrderService)
    {
        $this->repository = $repository;
        $this->userOrderService = $userOrderService;
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