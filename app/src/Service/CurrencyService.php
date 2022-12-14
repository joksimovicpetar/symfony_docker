<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\VarDumper\VarDumper;

class CurrencyService
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;

    }

    public function userOderCurrency($dataObjectCurrency)
    {
        $session = $this->requestStack->getSession();
        $session->set('currency', $dataObjectCurrency->getCurrency());
    }
}