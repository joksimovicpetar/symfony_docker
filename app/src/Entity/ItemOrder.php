<?php

namespace App\Entity;

use App\Repository\ItemOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderRepository::class)]
class ItemOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'Bowl', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'bowl_id', referencedColumnName: 'id')]
    private ?Bowl $bowl = null;

    #[ORM\ManyToOne(targetEntity: 'Size', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'size_id', referencedColumnName: 'id')]
    private ?Size $size = null;

    #[ORM\ManyToOne(targetEntity: 'Base', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'base_id', referencedColumnName: 'id')]
    private ?Base $base = null;

    #[ORM\ManyToOne(targetEntity: 'Sauce', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'sauce_id', referencedColumnName: 'id')]
    private ?Sauce $sauce = null;

    #[ORM\OneToMany(mappedBy: 'itemOrder' , targetEntity: ItemOrderIngredient::class, orphanRemoval: true)]
    private Collection $itemOrderIngredients;

    #[ORM\OneToMany(mappedBy: 'itemOrder', targetEntity: ItemOrderExtraIngredient::class, orphanRemoval: true)]
    private Collection $itemOrderExtraIngredients;

    #[ORM\Column]
    private ?int $orderStep = 1;

    #[ORM\ManyToOne(targetEntity: UserOrder::class, inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'user_order_id', referencedColumnName: 'id')]
    private ?UserOrder $userOrder = null;


    public function __construct()
    {
        $this->itemOrderIngredients = new ArrayCollection();
        $this->itemOrders = new ArrayCollection();
        $this->itemOrderExtraIngredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Bowl|null
     */
    public function getBowl(): ?Bowl
    {
        return $this->bowl;
    }

    /**
     * @param Bowl|null $bowl
     * @return ItemOrder
     */
    public function setBowl(?Bowl $bowl): ItemOrder
    {
        $this->bowl = $bowl;
        return $this;
    }

    /**
     * @return Size|null
     */
    public function getSize(): ?Size
    {
        return $this->size;
    }

    /**
     * @param Size|null $size
     * @return ItemOrder
     */
    public function setSize(?Size $size): ItemOrder
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return Base|null
     */
    public function getBase(): ?Base
    {
        return $this->base;
    }

    /**
     * @param Base|null $base
     * @return ItemOrder
     */
    public function setBase(?Base $base): ItemOrder
    {
        $this->base = $base;
        return $this;
    }

    /**
     * @return Sauce|null
     */
    public function getSauce(): ?Sauce
    {
        return $this->sauce;
    }

    /**
     * @param Sauce|null $sauce
     * @return ItemOrder
     */
    public function setSauce(?Sauce $sauce): ItemOrder
    {
        $this->sauce = $sauce;
        return $this;
    }



    /**
     * @return Collection<int, ItemOrderIngredient>
     */
    public function getItemOrderIngredients(): Collection
    {
        return $this->itemOrderIngredients;
    }

    public function addItemOrderIngredient(ItemOrderIngredient $itemOrderIngredient): self
    {
        if (!$this->itemOrderIngredients->contains($itemOrderIngredient)) {
            $this->itemOrderIngredients->add($itemOrderIngredient);
            $itemOrderIngredient->setItemOrderId($this);
        }

        return $this;
    }

    public function removeItemOrderIngredient(ItemOrderIngredient $itemOrderIngredient): self
    {
        if ($this->itemOrderIngredients->removeElement($itemOrderIngredient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderIngredient->getItemOrderId() === $this) {
                $itemOrderIngredient->setItemOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ItemOrderExtraIngredient>
     */
    public function getItemOrderExtraIngredients(): Collection
    {
        return $this->itemOrderExtraIngredients;
    }

    public function addItemOrderExtraIngredient(ItemOrderExtraIngredient $itemOrderExtraIngredient): self
    {
        if (!$this->itemOrderExtraIngredients->contains($itemOrderExtraIngredient)) {
            $this->itemOrderExtraIngredients->add($itemOrderExtraIngredient);
            $itemOrderExtraIngredient->setItemOrderId($this);
        }

        return $this;
    }

    public function removeItemOrderExtraIngredient(ItemOrderExtraIngredient $itemOrderExtraIngredient): self
    {
        if ($this->itemOrderExtraIngredients->removeElement($itemOrderExtraIngredient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderExtraIngredient->getItemOrderId() === $this) {
                $itemOrderExtraIngredient->setItemOrderId(null);
            }
        }

        return $this;
    }

    public function getOrderStep(): ?int
    {
        return $this->orderStep;
    }

    public function setOrderStep(int $orderStep): self
    {
        $this->orderStep = $orderStep;

        return $this;
    }

    public function getUserOrder(): ?UserOrder
    {
        return $this->userOrder;
    }

    public function setUserOrder(?UserOrder $userOrder): self
    {
        $this->userOrder = $userOrder;

        return $this;
    }


}
