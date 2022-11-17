<?php
namespace App\Extension;


use App\Service\ItemOrderExtraIngredientService;
use App\Service\ItemOrderService;
use App\Service\UserOrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class PriceExtension extends AbstractExtension
{

    /**
     * @var ItemOrderExtraIngredientService
     */
    private ItemOrderExtraIngredientService $service;
    private ItemOrderService $itemOrderService;
    public function __construct(UserOrderService $userOrderService)
    {
        $this->userOrderService = $userOrderService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('item_order_price', [$this, 'findPrice']),
        ];
    }

    function findPrice($itemOrder) : float
    {
        return $this->userOrderService->findPrice($itemOrder);
    }

}