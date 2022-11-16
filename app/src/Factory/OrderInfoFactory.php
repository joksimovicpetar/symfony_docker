<?php

namespace App\Factory;

use App\Entity\OrderInfo;

class OrderInfoFactory
{

    public static function orderInfoFromParams($parameters){
        $fullName = $parameters['fullName'];
        $address = $parameters['address'];
        $phoneNumber = $parameters['phoneNumber'];
        $time = $parameters['time'];
        $payment = $parameters['payment'];
        $date = $parameters['date'];
        $note = $parameters['note'];

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