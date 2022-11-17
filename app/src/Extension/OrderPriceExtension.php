<?php
namespace App\Extension;

use App\Service\UserOrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class OrderPriceExtension extends AbstractExtension
{

    /**
     * @var UserOrderService
     */
    private UserOrderService $service;

    public function __construct(UserOrderService $service)
    {
        $this->service = $service;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_user_order_price', [$this, 'findUserOrderPrice']),
        ];
    }

    public function findUserOrderPrice(): float

    {
        $userOrder = $this->service->findUserOrders();
        $itemOrders = $userOrder->getItemOrders()->getValues();
        $sum = 0;
        foreach ($itemOrders as $itemOrder) {
            $sum += $itemOrder->getTotalPrice();
        }
        return $sum;

    }

}