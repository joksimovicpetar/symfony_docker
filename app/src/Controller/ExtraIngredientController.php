<?php

namespace App\Controller;

use App\Service\ExtraIngredientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtraIngredientController extends AbstractController
{
    #[Route('/extra_ingredient', name: 'extra_ingredient_list', methods: 'GET')]
    public function index(ExtraIngredientService $service): Response
    {
        $extraIngredients = $service->findExtraIngredients();

        return $this->render('extra_ingredient/index.html.twig', [
            'extraIngredients' => $extraIngredients,
        ]);
    }
}
