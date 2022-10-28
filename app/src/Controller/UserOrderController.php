<?php

namespace App\Controller;

use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserOrderController extends AbstractController
{
    #[Route('/user_order', name: 'order_list')]
    public function findUserOrders(UserOrderService $service): Response
    {
        $userOrders = $service->findUserOrders();

        return $this->render('user_order/index.html.twig', [
            'user_orders' => $userOrders,
        ]);
    }
}
