<?php

namespace App\Controller;

use App\Entity\Bowl;
use App\Entity\DataObject;
use App\Service\BowlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/bowl/new', name: 'app_bowl_edit', methods: ['POST'])]
    public function edit(BowlService $bowlService, DataObject $dataObject)
    {
        $bowlService->updateBowl($dataObject);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
