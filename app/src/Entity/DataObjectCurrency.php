<?php

namespace App\Entity;


class DataObjectCurrency
{
    private ?string $currency = null;

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     * @return DataObjectCurrency
     */
    public function setCurrency(?string $currency): DataObjectCurrency
    {
        $this->currency = $currency;
        return $this;
    }




}