<?php

namespace App\Entity;

use App\Repository\IngridientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngridientRepository::class)]
class Ingridient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'ingridientsId', targetEntity: ItemOrderIngridient::class)]
    private Collection $itemOrderIngridients;

    public function __construct()
    {
        $this->itemOrderIngridients = new ArrayCollection();
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
            $itemOrderIngridient->setIngridientsId($this);
        }

        return $this;
    }

    public function removeItemOrderIngridient(ItemOrderIngridient $itemOrderIngridient): self
    {
        if ($this->itemOrderIngridients->removeElement($itemOrderIngridient)) {
            // set the owning side to null (unless already changed)
            if ($itemOrderIngridient->getIngridientsId() === $this) {
                $itemOrderIngridient->setIngridientsId(null);
            }
        }

        return $this;
    }
}
