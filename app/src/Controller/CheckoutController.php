<?php

namespace App\Controller;

use App\Entity\OrderInfo;
use App\Form\OrderInfoType;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function findUserOrders(UserOrderService $service): Response
    {
        $orderInfo = new OrderInfo();
        $form = $this->createForm(OrderInfoType::class, $orderInfo);

        return $this->render('checkout/index.html.twig', [
            'orderInfoForm' => $form->createView(),
            'userOrder' => $service->findUserOrders()

        ]);
    }
}
