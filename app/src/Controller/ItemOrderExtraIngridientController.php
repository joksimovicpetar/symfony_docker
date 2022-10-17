<?php

namespace App\Controller;

use App\Service\ItemOrderExtraIngridentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemOrderExtraIngridientController extends AbstractController
{
    #[Route('item_order_extra_ingridient', name: 'app_item_order_extra_ingridient')]
    public function index(ItemOrderExtraIngridentService $service): Response
    {
        $itemOrderExtraIngridients = $service->findItemOrderExtraIngridient();

        return $this->render('item_order_extra_ingridient/index.html.twig', [
            'itemOrderExtraIngridients' => $itemOrderExtraIngridients,
        ]);
    }
}
