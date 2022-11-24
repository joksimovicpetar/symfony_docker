<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class DataObject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return DataObject
     */
    public function setId(?int $id): DataObject
    {
        $this->id = $id;
        return $this;
    }


}
