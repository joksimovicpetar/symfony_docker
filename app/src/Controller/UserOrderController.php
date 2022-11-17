<?php

namespace App\Controller;

use App\Service\ItemOrderExtraIngredientService;
use App\Service\ItemOrderService;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserOrderController extends AbstractController
{
    #[Route('/user_order', name: 'order_list')]
    public function findUserOrders(UserOrderService $service, ItemOrderExtraIngredientService $itemOrderExtraIngredientService): Response
    {
        $itemOrderExtraIngredients = $itemOrderExtraIngredientService->findItemOrderExtraIngredient();

        return $this->render('user_order/index.html.twig', [
            'userOrder' => $service->findUserOrders(),
            'itemOrderExtraIngredients' => $itemOrderExtraIngredients,
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

        return new JsonResponse(['html' => $render]);

    }

    #[Route('/user_order/update', name: 'order_list_update', methods: [ 'POST'])]
    public function update(Request $request, ItemOrderService $itemOrderService, UserOrderService $service)
    {
        $parameters = json_decode($request->getContent(), true);
        $itemOrderService->update($parameters);

        $render = $this->renderView('user_order/user-order-table.html.twig', [
            'userOrder' => $service->findUserOrders(),
        ]);

        return new JsonResponse(['html' => $render]);

    }
}
