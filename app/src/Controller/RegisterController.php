<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
//        $registerForm = $this->createFormBuilder()
//        ->add('username', TextType::class,[
//            'label' => 'Username'])
//        ->add('password', RepeatedType::class,[
//            'type' => PasswordType::class,
//            'required' => true,
//            'first_options' => ['label' => 'Password'],
//            'second_options' => ['label' => 'Repeat password'],
//            ])
//            ->add('register', SubmitType::class)
//            ->getForm();

        return $this->render('register/index.html.twig', [
//            'registerForm' => $registerForm->createView()
        ]);
    }

    #[Route('/register/write', name: 'register_update', methods: [ 'GET'])]
    public function write(Request $request, UserService $userService)
    {
        $parameters = json_decode($request->getContent(), true);
        $userService->write($parameters);

        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }
}
