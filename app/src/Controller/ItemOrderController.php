<?php

namespace App\Controller;

use App\Entity\ItemOrder;
use App\Form\ItemOrderType;
use App\Repository\ItemOrderRepository;
use App\Service\BowlService;
use App\Service\ItemOrderService;
use App\Service\SizeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\SizeController;

#[Route('/item_order')]
class ItemOrderController extends AbstractController
{
    #[Route('/', name: 'app_item_order_index', methods: ['GET'])]
    public function index(ItemOrderRepository $itemOrderRepository): Response
    {
        return $this->render('item_order/index.html.twig', [
            'item_orders' => $itemOrderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_item_order_new', methods: ['GET', 'POST'])]

    public function new(Request $request, ItemOrderRepository $itemOrderRepository, ItemOrderService $service, BowlService $bowlService)
    {
        $parameters = json_decode($request->getContent(), true);
        $bowl = $bowlService->find($parameters['valueId']);
        $itemOrder = new ItemOrder();

        $current = $service ->findItemOrderIdStatus();

        if ($current->getOrderStep()==6) {
            $itemOrder->setBowl($bowl);
            $itemOrder->setOrderStep(1);
            $service->save($itemOrder);

            $response = new Response();
            $response->setStatusCode(Response::HTTP_OK);
            $response->send();
        } else {
            $current->setBowl($bowl);
            $current->setOrderStep(1);
            $service->save($current);

            $response = new Response();
            $response->setStatusCode(Response::HTTP_OK);
            $response->send();
        }
//        return $this->redirectToRoute('app_size');

    }

    #[Route('/{id}', name: 'app_item_order_show', methods: ['GET'])]
    public function show(ItemOrder $itemOrder): Response
    {
        return $this->render('item_order/show.html.twig', [
            'item_order' => $itemOrder,
        ]);
    }


    #[Route('/{id}', name: 'app_item_order_delete', methods: ['POST'])]
    public function delete(Request $request, ItemOrder $itemOrder, ItemOrderRepository $itemOrderRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$itemOrder->getId(), $request->request->get('_token'))) {
            $itemOrderRepository->remove($itemOrder, true);
        }

        return $this->redirectToRoute('app_item_order_index', [], Response::HTTP_SEE_OTHER);
    }
}
