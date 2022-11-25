<?php

namespace App\Entity;

class DataObjectQuantity
{
    private ?int $id = null;
    private ?int $quantity = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return DataObjectQuantity
     */
    public function setId(?int $id): DataObjectQuantity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return DataObjectQuantity
     */
    public function setQuantity(?int $quantity): DataObjectQuantity
    {
        $this->quantity = $quantity;
        return $this;
    }


}