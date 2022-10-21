<?php

namespace App\Controller;

use App\Entity\ItemOrder;
use App\Form\ItemOrderType;
use App\Repository\ItemOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function new(Request $request, ItemOrderRepository $itemOrderRepository)
    {
        $itemOrder = new ItemOrder();

    }

    #[Route('/{id}', name: 'app_item_order_show', methods: ['GET'])]
    public function show(ItemOrder $itemOrder): Response
    {
        return $this->render('item_order/show.html.twig', [
            'item_order' => $itemOrder,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_item_order_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ItemOrder $itemOrder, ItemOrderRepository $itemOrderRepository): Response
    {
        $form = $this->createForm(ItemOrderType::class, $itemOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemOrderRepository->save($itemOrder, true);

            return $this->redirectToRoute('app_item_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item_order/edit.html.twig', [
            'item_order' => $itemOrder,
            'form' => $form,
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
