<?php

namespace App\Controller;

use App\Entity\DataObject;
use App\Service\SizeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ItemOrderService;

class SizeController extends AbstractController
{
    #[Route('/size', name: 'app_size', methods: 'GET')]
    public function index(SizeService $service): Response
    {
        $sizes = $service->findSizes();

        return $this->render('size/index.html.twig', [
            'sizes' => $sizes,
        ]);
    }

    #[Route('/size/edit', name: 'app_size_edit', methods: ['GET', 'POST'])]
    public function edit(ItemOrderService $service, SizeService $sizeService, DataObject $dataObject)
    {
        $sizeService->updateSize($dataObject);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
