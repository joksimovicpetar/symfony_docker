<?php

namespace App\Entity;

use App\Repository\UserOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserOrderRepository::class)]
class UserOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'userOrder', targetEntity: ItemOrder::class)]
    private Collection $itemOrder;

    public function __construct()
    {
        $this->itemOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ItemOrder>
     */
    public function getItemOrder(): Collection
    {
        return $this->itemOrder;
    }

    public function addItemOrder(ItemOrder $itemOrder): self
    {
        if (!$this->itemOrder->contains($itemOrder)) {
            $this->itemOrder->add($itemOrder);
            $itemOrder->setUserOrder($this);
        }

        return $this;
    }

    public function removeItemOrder(ItemOrder $itemOrder): self
    {
        if ($this->itemOrder->removeElement($itemOrder)) {
            // set the owning side to null (unless already changed)
            if ($itemOrder->getUserOrder() === $this) {
                $itemOrder->setUserOrder(null);
            }
        }

        return $this;
    }
}
