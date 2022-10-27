<?php

namespace App\Controller;

use App\Entity\ItemOrderIngredient;
use App\Repository\ItemOrderIngredientRepository;
use App\Service\ExtraIngredientService;
use App\Service\IngredientService;
use App\Service\ItemOrderExtraIngredientService;
use App\Service\ItemOrderIngredientService;
use App\Service\ItemOrderService;
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
    #[Route('/item_order_ingredient/edit', name: 'app_ingredient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ItemOrderService $service, ItemOrderIngredientService $itemOrderIngredientService, IngredientService $ingredientService)
    {
        $parameters = json_decode($request->getContent(), true);
        $param = $parameters['valueId'];
        $current = $service->findItemOrderIdStatus();
        $itemOrderIngredientService->deleteOnId($current->getId(), $itemOrderIngredientService);

        foreach ($param as $ingredientId) {
            $itemOrderIngredientService->updateIngredient($ingredientId, $service, $itemOrderIngredientService, $ingredientService);
        }

    }
}
