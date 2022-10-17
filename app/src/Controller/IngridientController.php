<?php

namespace App\Controller;

use App\Service\IngridientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngridientController extends AbstractController
{
    #[Route('/ingridient', name: 'ingridient_list', methods: 'GET')]
    public function index(IngridientService $service): Response
    {
        $ingridients = $service->findIngridients();

        return $this->render('ingridient/index.html.twig', [
            'ingridients' => $ingridients,
        ]);
    }
}
