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

    #[ORM\OneToMany(mappedBy: 'itemOrder' , targetEntity: ItemOrderIngridient::class, orphanRemoval: true)]
    private Collection $itemOrderIngridients;

    #[ORM\OneToMany(mappedBy: 'itemOrder', targetEntity: ItemOrderExtraIngridient::class, orphanRemoval: true)]
    private Collection $itemOrderExtraIngridients;

    #[ORM\Column]
    private ?int $orderStep = 1;


    public function __construct()
    {
        $this->itemOrderIngridients = new ArrayCollection();
        $this->itemOrders = new ArrayCollection();
        $this->itemOrderExtraIngridients = new ArrayCollection();
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
     * @return Collection<int, ItemOrderIngridient>
     */
    public function getItemOrderIngridients(): Collection
    {
        return $this->itemOrderIngridients;
    }

    public function addItemOrderIngridient(ItemOrderIngridient $itemOrderIngridient): self
    {
        if (!$this->itemOrderIngridients->contains($itemOrderIngridient)) {
            $this->itemOrderIngridients->add($itemOrderIngridient);
            $itemOrderIngridient->setItemOrderId($this);
        }

        return $this;
    }

    public function removeItemOrderIngridient(ItemOrderIngridient $itemOrderIngridient): self
    {
        if ($this->itemOrderIngridients->removeElement($itemOrderIngridient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderIngridient->getItemOrderId() === $this) {
                $itemOrderIngridient->setItemOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ItemOrderExtraIngridient>
     */
    public function getItemOrderExtraIngridients(): Collection
    {
        return $this->itemOrderExtraIngridients;
    }

    public function addItemOrderExtraIngridient(ItemOrderExtraIngridient $itemOrderExtraIngridient): self
    {
        if (!$this->itemOrderExtraIngridients->contains($itemOrderExtraIngridient)) {
            $this->itemOrderExtraIngridients->add($itemOrderExtraIngridient);
            $itemOrderExtraIngridient->setItemOrderId($this);
        }

        return $this;
    }

    public function removeItemOrderExtraIngridient(ItemOrderExtraIngridient $itemOrderExtraIngridient): self
    {
        if ($this->itemOrderExtraIngridients->removeElement($itemOrderExtraIngridient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderExtraIngridient->getItemOrderId() === $this) {
                $itemOrderExtraIngridient->setItemOrderId(null);
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


}
