<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class DataObjectCollection
{

    /**
     * @var DataObject[] The DataObjects
     */
    private array $dataObjects;

    public function __construct()
    {
        $this->dataObjects = [];
    }


    public function getDataObjects(): array
    {
        return $this->dataObjects;
    }

    public function setDataObjects(array $dataObjects): self
    {
        $this->dataObjects = $dataObjects;

        return $this;
    }

    public function add($object){
//        $this->dataObjects->add($object);
    }


}
