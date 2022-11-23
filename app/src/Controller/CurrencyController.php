<?php

namespace App\Controller;

use App\Service\CurrencyService;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class CurrencyController extends AbstractController
{
    #[Route('/currency', name: 'app_currency')]
    public function index(Request $request, CurrencyService $currencyService)
    {
        $parameters = json_decode($request->getContent(), true);
        $currencyService->userOderCurrency($parameters);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }
}
