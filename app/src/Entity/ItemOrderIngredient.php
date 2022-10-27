<?php

namespace App\Entity;

use App\Repository\ItemOrderIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderIngredientRepository::class)]
class ItemOrderIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'ItemOrder', inversedBy: 'itemOrderIngredients'),
    ORM\JoinColumn(name: 'item_order_id', referencedColumnName: 'id')]
    private ?itemOrder $itemOrder = null;

    #[ORM\ManyToOne(targetEntity: 'Ingredient', inversedBy: 'itemOrderIngredients'),
    ORM\JoinColumn(name: 'ingredient_id', referencedColumnName: 'id')]
    private ?Ingredient $ingredient = null;

    /**
     * @param itemOrder|null $itemOrder
     * @param Ingredient|null $ingredient
     */
    public function __construct(?itemOrder $itemOrder, ?Ingredient $ingredient)
    {
        $this->itemOrder = $itemOrder;
        $this->ingredient = $ingredient;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return itemOrder|null
     */
    public function getItemOrder(): ?itemOrder
    {
        return $this->itemOrder;
    }

    /**
     * @param itemOrder|null $itemOrder
     * @return ItemOrderIngredient
     */
    public function setItemOrder(?itemOrder $itemOrder): ItemOrderIngredient
    {
        $this->itemOrder = $itemOrder;
        return $this;
    }

    /**
     * @return Ingredient|null
     */
    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient|null $ingredient
     * @return ItemOrderIngredient
     */
    public function setIngredient(?Ingredient $ingredient): ItemOrderIngredient
    {
        $this->ingredient = $ingredient;
        return $this;
    }




    
}
