<?php

namespace App\Entity;

use App\Repository\ItemOrderIngridientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemOrderIngridientRepository::class)]
class ItemOrderIngridient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'ItemOrder', inversedBy: 'itemOrderIngridients'),
    ORM\JoinColumn(name: 'item_order_id', referencedColumnName: 'id')]
    private ?itemOrder $itemOrder = null;

    #[ORM\ManyToOne(targetEntity: 'Ingridient', inversedBy: 'itemOrderIngridients'),
    ORM\JoinColumn(name: 'ingridient_id', referencedColumnName: 'id')]
    private ?Ingridient $ingridient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return itemOrder|null
     */
    public function getItemOrder(): ?itemOrder
    {
        return $this->itemOrder;
    }

    /**
     * @param itemOrder|null $itemOrder
     * @return ItemOrderIngridient
     */
    public function setItemOrder(?itemOrder $itemOrder): ItemOrderIngridient
    {
        $this->itemOrder = $itemOrder;
        return $this;
    }

    /**
     * @return Ingridient|null
     */
    public function getIngridient(): ?Ingridient
    {
        return $this->ingridient;
    }

    /**
     * @param Ingridient|null $ingridient
     * @return ItemOrderIngridient
     */
    public function setIngridient(?Ingridient $ingridient): ItemOrderIngridient
    {
        $this->ingridient = $ingridient;
        return $this;
    }




    
}
