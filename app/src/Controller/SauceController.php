<?php

namespace App\Controller;

use App\Entity\Sauce;
use App\Service\ItemOrderService;
use App\Service\SauceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce', methods: ['GET'])]
    public function index(SauceService $service)
    {
       $sauces = $service->findSauces();

        return $this->render('sauce/index.html.twig', [
            'sauces' => $sauces
        ]);

    }

    #[Route('/sauce/edit', name: 'app_sauce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ItemOrderService $service, SauceService $sauceService)
    {
        $parameters = json_decode($request->getContent(), true);
        $current = $sauceService->updateSauce($parameters, $service, $sauceService);
        $service->save($current);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
