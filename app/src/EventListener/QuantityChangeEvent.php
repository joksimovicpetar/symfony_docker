<?php

namespace App\EventListener;

use App\Entity\ItemOrder;
use App\Entity\UserOrder;
use Symfony\Contracts\EventDispatcher\Event;

class QuantityChangeEvent extends Event
{


    private UserOrder $userOrder;
    private ItemOrder $itemOrder;

    public function __construct(UserOrder $userOrder, ItemOrder $itemOrder)
    {
        $this->userOrder = $userOrder;
        $this->itemOrder = $itemOrder;
    }

    /**
     * @return UserOrder
     */
    public function getUserOrder(): UserOrder
    {
        return $this->userOrder;
    }

    /**
     * @return ItemOrder
     */
    public function getItemOrder(): ItemOrder
    {
        return $this->itemOrder;
    }




}