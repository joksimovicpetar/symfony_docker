<?php

namespace App\Controller;

use App\Entity\ItemOrderIngredient;
use App\Repository\ItemOrderIngredientRepository;
use App\Service\ItemOrderIngredientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
