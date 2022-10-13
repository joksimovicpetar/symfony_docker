<?php

namespace App\Controller;

use App\Service\ExtraIngridientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtraIngridientController extends AbstractController
{
    #[Route('/extraingridient', name: 'extra_ingridient_list', methods: 'GET')]
    public function index(ExtraIngridientService $service): Response
    {
        $extraIngridients = $service->findAll();

        return $this->render('ingridient/index.html.twig', [
            'extraIngridients' => $extraIngridients,
        ]);
    }
}
