<?php

namespace App\Controller;

use App\Entity\DataObjectOrderInfo;
use App\Entity\OrderInfo;
use App\Form\OrderInfoType;
use App\Service\CheckoutService;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

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

    #[Route('/checkout/save', name: 'order_info_update', methods: [ 'POST'])]
    public function update(CheckoutService $checkoutService, DataObjectOrderInfo $dataObjectOrderInfo)
    {
        $checkoutService->save($dataObjectOrderInfo);
        $this->addFlash('message', 'Order successful');

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }
}
