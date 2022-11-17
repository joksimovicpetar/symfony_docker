<?php
namespace App\Extension;

use App\Service\UserOrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class DeliveryPriceExtension extends AbstractExtension
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
            new TwigFunction('current_user_order_delivery_price', [$this, 'findUserOrderDeliveryPrice']),
        ];
    }

    public function findUserOrderDeliveryPrice(): float

    {
//        Delivery price is currently fixed to null. Later add logic here to calculate it.
        return 0;

    }

}