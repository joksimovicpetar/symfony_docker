<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class DataObjectCollection
{

    /**
     * @var DataObject[] The DataObjects
     */
    private ArrayCollection $dataObjects;

    public function __construct()
    {
        $this->dataObjects = new ArrayCollection();
    }


    public function getDataObjects(): ArrayCollection
    {
        return $this->dataObjects;
    }

    public function setDataObjects(ArrayCollection $dataObjects): self
    {
        $this->dataObjects = $dataObjects;

        return $this;
    }

    public function add($object){
        $this->dataObjects->add($object);
    }


}
