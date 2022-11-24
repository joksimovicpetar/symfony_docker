<?php

namespace App\Entity;


class DataObjectOrderInfo
{
    private ?string $fullName = null;

    private ?string $address = null;

    private ?string $phoneNumber = null;

    private ?string $deliveryTime = null;

    private ?string $payment = null;

    private ?string $orderDate = null;

    private ?string $note = null;

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return DataObjectOrderInfo
     */
    public function setFullName(?string $fullName): DataObjectOrderInfo
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return DataObjectOrderInfo
     */
    public function setAddress(?string $address): DataObjectOrderInfo
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     * @return DataObjectOrderInfo
     */
    public function setPhoneNumber(?string $phoneNumber): DataObjectOrderInfo
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTime(): ?string
    {
        return $this->deliveryTime;
    }

    /**
     * @param string|null $deliveryTime
     * @return DataObjectOrderInfo
     */
    public function setDeliveryTime(?string $deliveryTime): DataObjectOrderInfo
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayment(): ?string
    {
        return $this->payment;
    }

    /**
     * @param string|null $payment
     * @return DataObjectOrderInfo
     */
    public function setPayment(?string $payment): DataObjectOrderInfo
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    /**
     * @param string|null $orderDate
     * @return DataObjectOrderInfo
     */
    public function setOrderDate(?string $orderDate): DataObjectOrderInfo
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return DataObjectOrderInfo
     */
    public function setNote(?string $note): DataObjectOrderInfo
    {
        $this->note = $note;
        return $this;
    }




}