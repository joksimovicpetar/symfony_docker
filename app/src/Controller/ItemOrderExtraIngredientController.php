<?php

namespace App\Controller;

use App\Service\ItemOrderExtraIngridentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemOrderExtraIngredientController extends AbstractController
{
    #[Route('item_order_extra_ingredient', name: 'app_item_order_extra_ingredient')]
    public function index(ItemOrderExtraIngridentService $service): Response
    {
        $itemOrderExtraIngredients = $service->findItemOrderExtraIngredient();

        return $this->render('item_order_extra_ingredient/index.html.twig', [
            'itemOrderExtraIngredients' => $itemOrderExtraIngredients,
        ]);
    }
}
