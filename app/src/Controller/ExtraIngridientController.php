<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtraIngridientController extends AbstractController
{
    #[Route('/extra/ingridient', name: 'app_extra_ingridient')]
    public function index(): Response
    {
        return $this->render('extra_ingridient/index.html.twig', [
            'controller_name' => 'ExtraIngridientController',
        ]);
    }
}
