<?php

namespace App\Entity;

use App\Repository\LoggerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoggerRepository::class)]
class Logger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'loggers')]
    private ?ItemOrder $itemOrder = null;

    #[ORM\Column]
    private array $quantity = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemOrder(): ?ItemOrder
    {
        return $this->itemOrder;
    }

    public function setItemOrder(?ItemOrder $itemOrder): self
    {
        $this->itemOrder = $itemOrder;

        return $this;
    }

    public function getQuantity(): array
    {
        return $this->quantity;
    }

    public function setQuantity(array $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

}
