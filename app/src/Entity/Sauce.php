<?php

namespace App\Entity;

use App\Repository\SauceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SauceRepository::class)]
class Sauce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'sauceId', targetEntity: ItemOrder::class)]
    private Collection $itemOrders;

    public function __construct()
    {
        $this->itemOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, ItemOrder>
     */
    public function getItemOrders(): Collection
    {
        return $this->itemOrders;
    }

    public function addItemOrder(ItemOrder $itemOrder): self
    {
        if (!$this->itemOrders->contains($itemOrder)) {
            $this->itemOrders->add($itemOrder);
            $itemOrder->setSauceId($this);
        }

        return $this;
    }

    public function removeItemOrder(ItemOrder $itemOrder): self
    {
        if ($this->itemOrders->removeElement($itemOrder)) {
            // set the owning side to null (unless already changed)
            if ($itemOrder->getSauceId() === $this) {
                $itemOrder->setSauceId(null);
            }
        }

        return $this;
    }
}
