<?php
namespace App\Extension;

use App\Entity\ItemOrder;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Service\ItemOrderService;

class LastItemExtension extends AbstractExtension
{

    /**
     * @var ItemOrderService
     */
    private ItemOrderService $service;

    public function __construct(ItemOrderService $service)
    {
        $this->service = $service;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_order', [$this, 'findItemOrderIdStatus']),
        ];
    }

    public function findItemOrderIdStatus() : ?ItemOrder

    {
        return $this->service->findItemOrderIdStatus();

    }

}