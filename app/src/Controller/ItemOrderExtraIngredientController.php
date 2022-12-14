<?php

namespace App\Controller;

use App\Entity\DataObjectCollection;
use App\Service\ExtraIngredientService;
use App\Service\ItemOrderExtraIngredientService;
use App\Service\ItemOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;


class ItemOrderExtraIngredientController extends AbstractController
{
    #[Route('item_order_extra_ingredient', name: 'app_item_order_extra_ingredient')]
    public function index(ItemOrderExtraIngredientService $service): Response
    {
        $itemOrderExtraIngredients = $service->findItemOrderExtraIngredient();


        return $this->render('item_order_extra_ingredient/index.html.twig', [
            'itemOrderExtraIngredients' => $itemOrderExtraIngredients,

        ]);
    }

    #[Route('/item_order_extra_ingredient/edit', name: 'app_ext_ingredient_edit', methods: ['GET', 'POST'])]
    public function edit(ItemOrderExtraIngredientService $itemOrderExtraIngredientService, DataObjectCollection $dataObjectCollection)
    {
        $itemOrderExtraIngredientService->deleteOnId();
        $itemOrderExtraIngredientService->update($dataObjectCollection);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
