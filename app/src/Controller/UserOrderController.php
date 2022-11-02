<?php

namespace App\Controller;

use App\Entity\ItemOrder;
use App\Service\ItemOrderService;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class UserOrderController extends AbstractController
{
    #[Route('/user_order', name: 'order_list')]
    public function findUserOrders(UserOrderService $service): Response
    {

        return $this->render('user_order/index.html.twig', [
            'userOrder' => $service->findUserOrders(),
        ]);
    }


    #[Route('/user_order/delete', name: 'order_list_delete', methods: ['DELETE', 'POST'])]
    public function delete(Request $request, ItemOrderService $itemOrderService, UserOrderService $service)
    {
        $parameters = json_decode($request->getContent(), true);
        $itemOrderId = $parameters['valueId'];
        $itemOrder = $itemOrderService->find($itemOrderId);
        $itemOrderService->delete($itemOrder);

        $render = $this->renderView('user_order/user-order-table.html.twig', [
            'userOrder' => $service->findUserOrders(),
        ]);
//        VarDumper::dump($render);
        return new JsonResponse(['html' => $render
        ]);


        // return $this->renderView('user_order/user-order-table.html.twig', array('userOrder' => $service->findUserOrders()));
//        VarDumper::dump($test);exit;
    }
}
