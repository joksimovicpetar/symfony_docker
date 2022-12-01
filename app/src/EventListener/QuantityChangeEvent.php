<?php

namespace App\EventListener;

use App\Entity\ItemOrder;
use App\Entity\UserOrder;
use Symfony\Contracts\EventDispatcher\Event;

class QuantityChangeEvent extends Event
{
    private ItemOrder $itemOrder;
    private array $quantity;

    public function __construct(ItemOrder $itemOrder, array $quantity)
    {
        $this->itemOrder = $itemOrder;
        $this->quantity = $quantity;
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

    /**
     * @return array
     */
    public function getQuantity(): array
    {
        return $this->quantity;
    }

    /**
     * @param array $quantity
     * @return QuantityChangeEvent
     */
    public function setQuantity(array $quantity): QuantityChangeEvent
    {
        $this->quantity = $quantity;
        return $this;
    }






}