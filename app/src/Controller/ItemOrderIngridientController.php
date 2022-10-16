<?php

namespace App\Controller;

use App\Entity\ItemOrderIngridient;
use App\Repository\ItemOrderIngridientRepository;
use App\Service\ItemOrderIngridientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemOrderIngridientController extends AbstractController
{
    #[Route('/item_order_ingridient', name: 'app_item_order_ingridient')]
    public function index(ItemOrderIngridientService $service): Response
    {
        $itemOrderIngridients = $service->findItemOrderIngridient();

        return $this->render('item_order_ingridient/index.html.twig', [
            'itemOrderIngridients' => $itemOrderIngridients,
        ]);
    }
}
