<?php

namespace App\Controller;

use App\Entity\Bowl;
use App\Entity\DataObject;
use App\Service\BowlService;
use App\Service\CategoryService;
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
    public function index(BowlService $service, CategoryService $categoryService): Response
    {
        $categories = $categoryService->findCategories();

        return $this->render('bowl/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/bowl', name: 'bowl_list_json', methods: ['POST'])]
    public function list(BowlService $service, Request $request, ItemOrderService $itemOrderService): Response
    {
        $offset = json_decode($request->getContent())->offset;
        $page = json_decode($request->getContent())->page;
        $category = json_decode($request->getContent())->category;
        $bowls = $service->findBowls($category, $offset, $page);
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
