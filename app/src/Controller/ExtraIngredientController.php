<?php

namespace App\Controller;

use App\Service\ExtraIngredientService;
use App\Service\ItemOrderIngredientService;
use App\Service\UserOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtraIngredientController extends AbstractController
{
    #[Route('/extra_ingredient', name: 'extra_ingredient_list', methods: 'GET')]
    public function index(ExtraIngredientService $service, UserOrderService $userOrderService, ItemOrderIngredientService $itemOrderIngredientService): Response
    {
        $extraIngredients = $service->findExtraIngredients();
        $itemOrderIngredients = $itemOrderIngredientService->findItemOrderIngredient();

        return $this->render('extra_ingredient/index.html.twig', [
            'extraIngredients' => $extraIngredients,
            'userOrder' => $userOrderService->findUserOrders(),
            'itemOrderIngredients' => $itemOrderIngredients,
        ]);
    }
}
