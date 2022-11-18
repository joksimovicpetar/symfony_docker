<?php

namespace App\Extension;

use App\Service\UserOrderService;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CurrencyFilter extends AbstractExtension
{
    private $requestStack;
    private UserOrderService $service;

    public function __construct(UserOrderService $service, RequestStack $requestStack)
    {
        $this->service = $service;
        $this->requestStack = $requestStack;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('price', [$this, 'formatPrice']),
        ];
    }

    public function formatPrice(float $number, int $decimals , string $decPoint , string $thousandsSep): string
    {
        $session = $this->requestStack->getSession();
        if ($session->get('currency')=='$'){
            $ponder = 1;
        } elseif ($session->get('currency')=='€'){
            $ponder = 0.97;
        } else {
            $ponder = 113.16;
        }
        $price = number_format($number*$ponder, $decimals, $decPoint, $thousandsSep);
        $price = $session->get('currency').' '.$price;

        return $price;
    }
}