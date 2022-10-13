<?php

namespace App\Controller;

use App\Entity\Sauce;
use App\Service\SauceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce', methods: ['GET'])]
    public function index(SauceService $service)
    {
       $sauces = $service->findAll();

        return $this->render('sauce/index.html.twig', [
            'sauces' => $sauces
        ]);

    }
}
