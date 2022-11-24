<?php

namespace App\Entity;


class DataObject
{
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
