<?php

namespace App\Controller;


use App\Entity\DataObjectCollection;
use App\Service\ItemOrderIngredientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;


class ItemOrderIngredientController extends AbstractController
{
    #[Route('/item_order_ingredient', name: 'app_item_order_ingredient')]
    public function index(ItemOrderIngredientService $service): Response
    {
        $itemOrderIngredients = $service->findItemOrderIngredient();

        return $this->render('item_order_ingredient/index.html.twig', [
            'itemOrderIngredients' => $itemOrderIngredients,
        ]);
    }
    #[Route('/item_order_ingredient/edit', name: 'app_ingredient_edit', methods: ['POST'])]
    public function edit(ItemOrderIngredientService $itemOrderIngredientService, DataObjectCollection $dataObjectCollection)
    {
        $itemOrderIngredientService->deleteOnId();
        $itemOrderIngredientService->update($dataObjectCollection);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
