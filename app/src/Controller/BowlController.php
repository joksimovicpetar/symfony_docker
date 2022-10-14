<?php

namespace App\Controller;

use App\Service\BowlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
