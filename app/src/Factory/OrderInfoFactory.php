<?php

namespace App\Factory;

use App\Entity\OrderInfo;
use Symfony\Component\VarDumper\VarDumper;

class OrderInfoFactory
{

    public static function orderInfoFromParams($dataObjectOrderInfo){
        $fullName = $dataObjectOrderInfo->getAddress();
        $address = $dataObjectOrderInfo->getFullName();
        $phoneNumber = $dataObjectOrderInfo->getPhoneNumber();
        $time = $dataObjectOrderInfo->getDeliveryTime();
        $payment = $dataObjectOrderInfo->getPayment();
        $date = $dataObjectOrderInfo->getOrderDate();
        $note = $dataObjectOrderInfo->getNote();

        $orderInfo = new OrderInfo();
        $orderInfo->setFullName($fullName);
        $orderInfo->setAddress($address);
        $orderInfo->setPhoneNumber($phoneNumber);
        $orderInfo->setDeliveryTime($time);
        $orderInfo->setPayment($payment);
        $orderInfo->setOrderDate($date);
        $orderInfo->setNote($note);

        return $orderInfo;
    }
}