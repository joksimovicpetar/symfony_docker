<?php

namespace App\Entity;

use App\Repository\OrderInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderInfoRepository::class)]
class OrderInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fullName = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveryTime = null;

    #[ORM\Column(length: 255)]
    private ?string $payment = null;

    #[ORM\Column(length: 255)]
    private ?string $orderDate = null;

    #[ORM\Column(length: 255)]
    private ?string $note = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove']),
    ORM\JoinColumn(name: 'user_order_id', referencedColumnName: 'id')]
    private ?UserOrder $userOrderId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getDeliveryTime(): ?string
    {
        return $this->deliveryTime;
    }

    public function setDeliveryTime(string $deliveryTime): self
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    public function setOrderDate(string $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getUserOrderId(): ?UserOrder
    {
        return $this->userOrderId;
    }

    public function setUserOrderId(?UserOrder $userOrderId): self
    {
        $this->userOrderId = $userOrderId;

        return $this;
    }
}
