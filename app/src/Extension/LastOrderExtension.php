<?php
namespace App\Extension;

use App\Entity\ItemOrder;
use App\Entity\UserOrder;
use App\Service\UserOrderService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Service\ItemOrderService;

class LastOrderExtension extends AbstractExtension
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
            new TwigFunction('current_user_order', [$this, 'findUserOrders']),
        ];
    }

    public function findUserOrders() : ?UserOrder

    {
        return $this->service->findUserOrders();

    }

}