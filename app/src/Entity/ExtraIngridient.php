<?php

namespace App\Entity;

use App\Repository\ExtraIngridientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraIngridientRepository::class)]
class ExtraIngridient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $currency = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'extraIngridient', targetEntity: ItemOrderExtraIngridient::class)]
    private Collection $itemOrderExtraIngridients;

    public function __construct()
    {
        $this->itemOrderExtraIngridients = new ArrayCollection();
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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
            $itemOrderExtraIngridient->setExtraIngridientId($this);
        }

        return $this;
    }

    public function removeItemOrderExtraIngridient(ItemOrderExtraIngridient $itemOrderExtraIngridient): self
    {
        if ($this->itemOrderExtraIngridients->removeElement($itemOrderExtraIngridient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderExtraIngridient->getExtraIngridientId() === $this) {
                $itemOrderExtraIngridient->setExtraIngridientId(null);
            }
        }

        return $this;
    }
}
