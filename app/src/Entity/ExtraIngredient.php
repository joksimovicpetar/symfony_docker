<?php

namespace App\Entity;

use App\Repository\ExtraIngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraIngredientRepository::class)]
class ExtraIngredient
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

    #[ORM\OneToMany(mappedBy: 'extraIngredient', targetEntity: ItemOrderExtraIngredient::class)]
    private Collection $itemOrderExtraIngredients;

    public function __construct()
    {
        $this->itemOrderExtraIngredients = new ArrayCollection();
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
            $itemOrderExtraIngredient->setExtraIngredientId($this);
        }

        return $this;
    }

    public function removeItemOrderExtraIngredient(ItemOrderExtraIngredient $itemOrderExtraIngredient): self
    {
        if ($this->itemOrderExtraIngredients->removeElement($itemOrderExtraIngredient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderExtraIngredient->getExtraIngredientId() === $this) {
                $itemOrderExtraIngredient->setExtraIngredientId(null);
            }
        }

        return $this;
    }
}
