<?php

namespace App\EventListener;

use App\Controller\BowlController;

use App\Repository\ItemOrderRepository;
use App\Service\ItemOrderService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;

class RequestListener
{

    public function __construct(ItemOrderService $service, BowlController $controller, Security $security)
    {
        $this->service = $service;
        $this->controller = $controller;
        $this->security = $security;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $stepName = substr($event->getRequest()->getPathinfo(), 1);
//        $step = 0;
        $steps = array(
            'login'=>0,
            'register'=>0,
            'bowl'=>1,
            'size'=>2,
            'base'=>3,
            'sauce'=>4,
            'ingredient'=>5,
            'extra_ingredient'=>6,
            'checkout'=>7,
            'user_order'=>7,
            'user_order/delete'=>7,
            'user_order/update'=>7);
//        VarDumper::dump($event->getRequest()->getSchemeAndHttpHost().$stepName);exit;

        if(isset($steps[$stepName]) && $steps[$stepName] == 0){
        }
        elseif(isset($steps[$stepName]) && $steps[$stepName] != 7  && $this->service->findItemOrderIdStatus() != null) {

            $current = $this->service->findItemOrderIdStatus()->getOrderStep();

            if ($steps[$stepName] > $current + 1) {
                $currentRoute = '/'.array_search($current+1, $steps);
                $event->setResponse(new RedirectResponse($event->getRequest()->getSchemeAndHttpHost().$currentRoute));
            }
        }
        elseif ($this->service->findItemOrderIdStatus()==null && isset($steps[$stepName]) && $steps[$stepName] != 1 && $steps[$stepName] != 7){

            $event->setResponse(new RedirectResponse($event->getRequest()->getSchemeAndHttpHost().'/bowl'));
        }
    }
}