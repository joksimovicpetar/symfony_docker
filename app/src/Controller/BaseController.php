<?php

namespace App\Controller;

use App\Entity\DataObject;
use App\Service\BaseService;
use App\Service\ItemOrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'app_base')]
    public function index(BaseService $service): Response
    {
        $bases = $service->findBases();

        return $this->render('base/index.html.twig', [
            'bases' => $bases,
        ]);
    }

    #[Route('/base/edit', name: 'app_base_edit', methods: ['GET', 'POST'])]
    public function edit(ItemOrderService $service, BaseService $baseService, DataObject $dataObject)
    {
        $baseService->updateBase($dataObject);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
