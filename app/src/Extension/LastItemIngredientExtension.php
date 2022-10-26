<?php
namespace App\Extension;


use App\Entity\ItemOrderExtraIngredient;
use App\Service\ItemOrderExtraIngredientService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class LastItemIngredientExtension extends AbstractExtension
{

    /**
     * @var ItemOrderExtraIngredientService
     */
    private ItemOrderExtraIngredientService $service;

    public function __construct(ItemOrderExtraIngredientService $service)
    {
        $this->service = $service;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_extra_ingredient', [$this, 'findLastItemOrderExtraIngredient']),
        ];
    }

    function findLastItemOrderExtraIngredient() : ?ItemOrderExtraIngredient
    {
        return $this->service->findLastItemOrderExtraIngredient();
    }

}