<?php

namespace App\Controller;

use App\Entity\Sauce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce')]
    public function index(\Doctrine\Persistence\ManagerRegistry $doctrine)
    {
        $sauce = new Sauce();
        $sauce->setName('proba');
        $sauce->setDescription('testtestest');

        $em = $doctrine->getManager();

        $getSauce = $em->getRepository(Sauce::class)->findOneBy([
            'id'=>1
        ]);

        return $this->render('sauce/index.html.twig', [
            'sauce' => $getSauce
        ]);

    }
}
