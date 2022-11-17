<?php

namespace App\Controller;

use App\Service\BowlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/bowl/new', name: 'app_bowl_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BowlService $bowlService)
    {
        $parameters = json_decode($request->getContent(), true);
        $bowlService->updateBowl($parameters);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

    }
}
