<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Bowl::class),
    ORM\JoinColumn(name: 'bowl_id', referencedColumnName: 'id')]
    private Collection $bowls;

    /**
     * @return Collection
     */
    public function getBowls(): Collection
    {
        return $this->bowls;
    }

    /**
     * @param Collection $bowls
     * @return Category
     */
    public function setBowl(Collection $bowls): Category
    {
        $this->bowls = $bowls;
        return $this;
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
}
