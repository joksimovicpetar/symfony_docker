<?php

namespace App\Controller;

use App\Service\BaseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'app_base')]
    public function index(BaseService $service): Response
    {
        $bases = $service->findBases();

        return $this->render('base/index.html.twig', [
            'bases' => $bases,
        ]);
    }
}
