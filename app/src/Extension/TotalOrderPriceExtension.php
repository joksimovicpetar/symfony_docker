<?php
namespace App\Extension;

use App\Service\UserOrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class TotalOrderPriceExtension extends AbstractExtension
{

    /**
     * @var UserOrderService
     */
    private UserOrderService $service;
    private OrderPriceExtension $orderPriceExtension;
    private DeliveryPriceExtension $deliveryPriceExtension;

    public function __construct(UserOrderService $service, OrderPriceExtension $orderPriceExtension, DeliveryPriceExtension $deliveryPriceExtension)
    {
        $this->service = $service;
        $this->orderPriceExtension = $orderPriceExtension;
        $this->deliveryPriceExtension = $deliveryPriceExtension;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_user_order_total_price', [$this, 'findUserOrderTotalPrice']),
        ];
    }

    public function findUserOrderTotalPrice(): float

    {
        $orderPrice = $this->orderPriceExtension->findUserOrderPrice();
        $deliveryPrice = $this->deliveryPriceExtension->findUserOrderDeliveryPrice();
        return $orderPrice + $deliveryPrice;
    }

}