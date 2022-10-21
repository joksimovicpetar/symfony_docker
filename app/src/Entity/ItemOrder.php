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
    private ?Bowl $bowlId = null;

    #[ORM\ManyToOne(targetEntity: 'Size', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'size_id', referencedColumnName: 'id')]
    private ?Size $sizeId = null;

    #[ORM\ManyToOne(targetEntity: 'Base', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'base_id', referencedColumnName: 'id')]
    private ?Base $baseId = null;

    #[ORM\ManyToOne(targetEntity: 'Sauce', inversedBy: 'itemOrders'),
    ORM\JoinColumn(name: 'sauce_id', referencedColumnName: 'id')]
    private ?Sauce $sauceId = null;

    #[ORM\OneToMany(mappedBy: 'itemOrderId' , targetEntity: ItemOrderIngridient::class, orphanRemoval: true)]
    private Collection $itemOrderIngridients;

    #[ORM\OneToMany(mappedBy: 'itemOrderId', targetEntity: ItemOrderExtraIngridient::class, orphanRemoval: true)]
    private Collection $itemOrderExtraIngridients;

    #[ORM\Column]
    private ?int $orderStep = null;


    public function __construct()
    {
        $this->itemOrderIngridients = new ArrayCollection();
        $this->itemOrderIds = new ArrayCollection();
        $this->itemOrderExtraIngridients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBowlId(): ?Bowl
    {
        return $this->bowlId;
    }

    public function setBowlId(?Bowl $bowlId): self
    {
        $this->bowlId = $bowlId;

        return $this;
    }

    public function getSizeId(): ?Size
    {
        return $this->sizeId;
    }

    public function setSizeId(?Size $sizeId): self
    {
        $this->sizeId = $sizeId;

        return $this;
    }

    public function getBaseId(): ?Base
    {
        return $this->baseId;
    }

    public function setBaseId(?Base $baseId): self
    {
        $this->baseId = $baseId;

        return $this;
    }

    public function getSauceId(): ?Sauce
    {
        return $this->sauceId;
    }

    public function setSauceId(?Sauce $sauceId): self
    {
        $this->sauceId = $sauceId;

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
