<?php

namespace App\EventListener;

use App\Controller\BowlController;

use App\Repository\ItemOrderRepository;
use PHPUnit\Util\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;

class RequestListener
{

    public function __construct(ItemOrderRepository $repository, BowlController $controller, Security $security)
    {
        $this->repository = $repository;
        $this->controller = $controller;
        $this->security = $security;
    }


    public function onKernelRequest(RequestEvent $event)
    {
        $stepName = substr($event->getRequest()->getPathinfo(), 1);
        $token = $this->security->getToken();
//        $da = 'da';
//        $ne = 'ne';

//        if($token) {
////            VarDumper::dump($da);
////            $user = $token ? $token->getUser() : null;
//            $user = $this->security->getUser();
//            $userIdentifier = $user->getId();
//
//            $current = $this->repository->findItemOrderIdStatus()->getOrderStep();
//
//        }
//        else {
////            VarDumper::dump($ne);
//        }
//        $user = $token ? $token->getUser() : null;

//        $user = $this->security->getUser();
//        $userIdentifier = $user->getId();
//        VarDumper::dump( $stepName);exit;
        $step = 0;
        switch ($stepName) {
            case 'login':
            case 'register':
                $step = 0;
                break;
            case 'bowl':
                $step = 1;
                break;
            case 'size':
                $step = 2;
                break;
            case 'base':
                $step = 3;
                break;
            case 'sauce':
                $step = 4;
                break;
            case 'ingredient':
                $step = 5;
                break;
            case 'extra_ingredient':
                $step = 6;
                break;
            case 'checkout':
            case 'user_order':
            case 'user_order/delete':
            case 'user_order/update':
                $step = 7;
                break;
        }
//        VarDumper::dump($step);exit;
        if($step == 0){

        }
        elseif(($step != 7 ) && $this->repository->findItemOrderIdStatus() != null) {


            $current = $this->repository->findItemOrderIdStatus()->getOrderStep();


////        $user = $this->security->getUser();
////        $userIdentifier = $user->getId();
////        VarDumper::dump($userIdentifier);exit;
//
            if ($step > $current + 2) {
                $event->setResponse(new RedirectResponse('http://localhost:8080/login'));
            }
        }
    }
}