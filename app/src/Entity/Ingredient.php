<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: ItemOrderIngredient::class)]
    private Collection $itemOrderIngredients;

    public function __construct()
    {
        $this->itemOrderIngredients = new ArrayCollection();
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
            $itemOrderIngredient->setIngredientsId($this);
        }

        return $this;
    }

    public function removeItemOrderIngredient(ItemOrderIngredient $itemOrderIngredient): self
    {
        if ($this->itemOrderIngredients->removeElement($itemOrderIngredient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderIngredient->getIngredientsId() === $this) {
                $itemOrderIngredient->setIngredientsId(null);
            }
        }

        return $this;
    }
}
