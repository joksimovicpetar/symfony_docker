<?php

namespace App\Controller;

use App\Service\UserService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;

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

    #[Route('/register/write', name: 'register_update', methods: [ 'POST'])]
    public function write(Request $request, UserService $userService)
    {
        $parameters = json_decode($request->getContent(), true);
        try {
            $userService->write($parameters);
            return new JsonResponse(["message"=>"Great success!"], 200);

        } catch (UniqueConstraintViolationException $e) {
            return new JsonResponse(["message"=>"Username taken"], 202);
        }
        catch (Exception $e) {
            return new JsonResponse(["message"=>"Username taken"], 500);
        }


    }
}
