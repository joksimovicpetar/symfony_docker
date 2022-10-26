<?php

namespace App\Entity;

use App\Repository\ItemOrderExtraIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderExtraIngredientRepository::class)]
class ItemOrderExtraIngredient extends \App\Repository\ItemOrderExtraIngredientRepository
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'ItemOrder', inversedBy: 'itemOrderExtraIngredients'),
    ORM\JoinColumn(name: 'item_order_id', referencedColumnName: 'id')]
    private ?ItemOrder $itemOrder = null;

    #[ORM\ManyToOne(targetEntity: 'ExtraIngredient', inversedBy: 'itemOrderExtraIngredients'),
    ORM\JoinColumn(name: 'extra_ingredient_id', referencedColumnName: 'id')]
    private ?ExtraIngredient $extraIngredient = null;

    /**
     * @param ItemOrder|null $itemOrder
     * @param ExtraIngredient|null $extraIngredient
     */
    public function __construct(?ItemOrder $itemOrder, ?ExtraIngredient $extraIngredient)
    {
        $this->itemOrder = $itemOrder;
        $this->extraIngredient = $extraIngredient;
    }


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
     * @return ItemOrderExtraIngredient
     */
    public function setItemOrder(?ItemOrder $itemOrder): ItemOrderExtraIngredient
    {
        $this->itemOrder = $itemOrder;
        return $this;
    }

    /**
     * @return ExtraIngredient|null
     */
    public function getExtraIngredient(): ?ExtraIngredient
    {
        return $this->extraIngredient;
    }

    /**
     * @param ExtraIngredient|null $extraIngredient
     * @return ItemOrderExtraIngredient
     */
    public function setExtraIngredient(?ExtraIngredient $extraIngredient): ItemOrderExtraIngredient
    {
        $this->extraIngredient = $extraIngredient;
        return $this;
    }




}
