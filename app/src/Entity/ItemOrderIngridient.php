<?php

namespace App\Entity;

use App\Repository\ItemOrderIngridientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderIngridientRepository::class)]
class ItemOrderIngridient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'itemOrderIngridients')]
    private ?itemOrder $itemOrderId = null;

    #[ORM\ManyToOne(inversedBy: 'itemOrderIngridients')]
    private ?Ingridient $ingridientsId = null;

    public function getItemOrderId(): ?itemOrder
    {
        return $this->itemOrderId;
    }

    public function setItemOrderId(?itemOrder $itemOrderId): self
    {
        $this->itemOrderId = $itemOrderId;

        return $this;
    }

    public function getIngridientsId(): ?Ingridient
    {
        return $this->ingridientsId;
    }

    public function setIngridientsId(?Ingridient $ingridientsId): self
    {
        $this->ingridientsId = $ingridientsId;

        return $this;
    }


    
}
