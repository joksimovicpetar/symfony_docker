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
    private ?ItemOrder $itemOrder = null;

    #[ORM\ManyToOne(targetEntity: 'ExtraIngridient', inversedBy: 'itemOrderExtraIngridients'),
    ORM\JoinColumn(name: 'extra_ingridient_id', referencedColumnName: 'id')]
    private ?ExtraIngridient $extraIngridient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ItemOrder|null
     */
    public function getItemOrder(): ?ItemOrder
    {
        return $this->itemOrder;
    }

    /**
     * @param ItemOrder|null $itemOrder
     * @return ItemOrderExtraIngridient
     */
    public function setItemOrder(?ItemOrder $itemOrder): ItemOrderExtraIngridient
    {
        $this->itemOrder = $itemOrder;
        return $this;
    }

    /**
     * @return ExtraIngridient|null
     */
    public function getExtraIngridient(): ?ExtraIngridient
    {
        return $this->extraIngridient;
    }

    /**
     * @param ExtraIngridient|null $extraIngridient
     * @return ItemOrderExtraIngridient
     */
    public function setExtraIngridient(?ExtraIngridient $extraIngridient): ItemOrderExtraIngridient
    {
        $this->extraIngridient = $extraIngridient;
        return $this;
    }




}
