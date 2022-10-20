<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemOrderController extends AbstractController
{
    #[Route('/item_order', name: 'app_item_order')]
    public function index(): Response
    {
        return $this->render('item_order/index.html.twig', [
            'controller_name' => 'ItemOrderController',
        ]);
    }
}
