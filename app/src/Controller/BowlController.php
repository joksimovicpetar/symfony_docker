<?php

namespace App\Controller;

use App\Entity\Bowl;
use App\Entity\DataObject;
use App\Service\BowlService;
use App\Service\ItemOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;


class BowlController extends AbstractController
{
    #[Route('/bowl', name: 'bowl_list', methods: ['GET'])]
    public function index(BowlService $service): Response
    {
        $bowls = $service->findBowls();

        return $this->render('bowl/index.html.twig', [
            'bowls' => $bowls,
        ]);
    }

    #[Route('/bowl', name: 'bowl_list_json', methods: ['POST'])]
    public function list(BowlService $service, Request $request, ItemOrderService $itemOrderService): Response
    {
        $offset = json_decode($request->getContent())->offset;
        $page = json_decode($request->getContent())->page;
        $bowls = $service->findBowls($offset, $page);
        $currentOrder = $itemOrderService->findItemOrderIdStatus();

        $render = $this->renderView('bowl/bowl-list-component.html.twig', [
            'bowls' => $bowls,
            'currentOrder' => $currentOrder
        ]);

        return new JsonResponse(['html' => $render, 'hasMoreResults' => count($bowls)==$offset]);
    }

    #[Route('/bowl/new', name: 'app_bowl_edit', methods: ['POST'])]
    public function edit(BowlService $bowlService, DataObject $dataObject)
    {
        $bowlService->updateBowl($dataObject);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
