<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemOrderIngridientController extends AbstractController
{
    #[Route('/item/order/ingridient', name: 'app_item_order_ingridient')]
    public function index(): Response
    {
        return $this->render('item_order_ingridient/index.html.twig', [
            'controller_name' => 'ItemOrderIngridientController',
        ]);
    }
}
