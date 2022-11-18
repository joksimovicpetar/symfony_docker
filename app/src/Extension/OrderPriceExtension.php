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
        return $this->service->findUserOrderPrice();
    }

}