<?php

namespace App\Controller;

use App\Service\SizeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
