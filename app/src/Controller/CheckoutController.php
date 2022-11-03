<?php

namespace App\Controller;

use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function findUserOrders(UserOrderService $service): Response
    {

        return $this->render('checkout/index.html.twig', [
            'userOrder' => $service->findUserOrders(),
        ]);
    }
}
