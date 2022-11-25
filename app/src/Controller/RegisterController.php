<?php

namespace App\Controller;

use App\Entity\DataObjectRegistration;
use App\Service\UserService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('register/index.html.twig', [
        ]);
    }

    #[Route('/register/write', name: 'register_update', methods: [ 'POST'])]
    public function write(UserService $userService, DataObjectRegistration $dataObjectRegistration)
    {

        try {
            $userService->write($dataObjectRegistration);
            $this->addFlash('messageSuccess', 'Registration successful');
            return new JsonResponse(["message"=>"Great success!"], 200);

        } catch (UniqueConstraintViolationException $e) {
            return new JsonResponse(["message"=>"Username taken"], 202);
        }
        catch (Exception $e) {
            return new JsonResponse(["message"=>"Username taken"], 500);
        }
    }
}
