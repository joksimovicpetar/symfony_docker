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
        $current = $this->repository->findItemOrderIdStatus()->getOrderStep();

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
                $step = 7;
                break;
        }
//        $user = $this->security->getUser();
//        $userIdentifier = $user->getId();
//        VarDumper::dump($userIdentifier);exit;

        if ($step > $current + 2) {
            $event->setResponse(new RedirectResponse('http://localhost:8080/login'));
        }
    }
}