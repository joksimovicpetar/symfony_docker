<?php

namespace App\Controller;

use App\Service\IngredientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient_list', methods: 'GET')]
    public function index(IngredientService $service): Response
    {
        $ingredients = $service->findIngredients();

        return $this->render('ingredient/index.html.twig', [
            'ingredients' => $ingredients,
        ]);
    }
}
