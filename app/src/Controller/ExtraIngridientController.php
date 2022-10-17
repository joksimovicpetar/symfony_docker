<?php

namespace App\Controller;

use App\Service\ExtraIngridientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtraIngridientController extends AbstractController
{
    #[Route('/extra_ingridient', name: 'extra_ingridient_list', methods: 'GET')]
    public function index(ExtraIngridientService $service): Response
    {
        $extraIngridients = $service->findExtraIngridients();

        return $this->render('extra_ingridient/index.html.twig', [
            'extraIngridients' => $extraIngridients,
        ]);
    }
}
