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

    #[ORM\OneToMany(mappedBy: 'userOrder', targetEntity: ItemOrder::class),
    ORM\JoinColumn(name: 'item_order_id', referencedColumnName: 'id')]
    private Collection $itemOrders;

    public function __construct()
    {
        $this->itemOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    /**
     * @return Collection<int, ItemOrder>
     */
    public function getItemOrders(): Collection
    {
        return $this->itemOrders;
    }

    public function addItemOrders(ItemOrder $itemOrder): self
    {
        if (!$this->itemOrders->contains($itemOrder)) {
            $this->itemOrders->add($itemOrder);
            $itemOrder->setUserOrder($this);
        }

        return $this;
    }

    public function removeItemOrders(ItemOrder $itemOrder): self
    {
        if ($this->itemOrders->removeElement($itemOrder)) {
            // set the owning side to null (unless already changed)
            if ($itemOrder->getUserOrder() === $this) {
                $itemOrder->setUserOrder(null);
            }
        }

        return $this;
    }
}
