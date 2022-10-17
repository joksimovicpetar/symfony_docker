<?php

namespace App\Entity;

use App\Repository\ItemOrderExtraIngridientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderExtraIngridientRepository::class)]
class ItemOrderExtraIngridient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'ItemOrder', inversedBy: 'itemOrderExtraIngridients'),
    ORM\JoinColumn(name: 'item_order_id', referencedColumnName: 'id')]
    private ?ItemOrder $itemOrderId = null;

    #[ORM\ManyToOne(targetEntity: 'ExtraIngridient', inversedBy: 'itemOrderExtraIngridients'),
    ORM\JoinColumn(name: 'extra_ingridient_id', referencedColumnName: 'id')]
    private ?ExtraIngridient $extraIngridientId = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getExtraIngridientId(): ?ExtraIngridient
    {
        return $this->extraIngridientId;
    }

    public function setExtraIngridientId(?ExtraIngridient $extraIngridientId): self
    {
        $this->extraIngridientId = $extraIngridientId;

        return $this;
    }


}
