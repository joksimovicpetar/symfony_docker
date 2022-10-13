<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    #[Route('/view', name: 'app_view')]
    public function index()
    {
        $day = date("l");
        $user = [
            'name' => 'Petar',
            'surname' => 'Joksimovic',
            'age' => '27',
        ];

        $a = array("apple","pear","hello","world");

        return $this->render('view/index.html.twig', [
            'd' => $day,
            'user' => $user,
            'a' => $a,
        ]);
    }
}
