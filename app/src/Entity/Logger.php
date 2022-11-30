<?php

namespace App\Entity;

use App\Repository\LoggerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoggerRepository::class)]
class Logger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'loggers')]
    private ?UserOrder $userOrderId = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?ItemOrder $itemOrderId = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getItemOrderId(): ?ItemOrder
    {
        return $this->itemOrderId;
    }

    public function setItemOrderId(?ItemOrder $itemOrderId): self
    {
        $this->itemOrderId = $itemOrderId;

        return $this;
    }
}
