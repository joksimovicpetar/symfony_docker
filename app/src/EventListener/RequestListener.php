<?php

namespace App\EventListener;


use App\Service\ItemOrderService;
use App\Util\CheckoutUtil;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class RequestListener
{

    private ItemOrderService $service;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(ItemOrderService $service, UrlGeneratorInterface $urlGenerator)
    {

        $this->service = $service;
        $this->urlGenerator = $urlGenerator;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $stepName = $event->getRequest()->get('_route');
        if (!array_key_exists($stepName, CheckoutUtil::CHECKOUT_ROUTES)){
            return;
        }

        $itemOrder = $this->service->findItemOrderIdStatus();
        $requestedStep = CheckoutUtil::CHECKOUT_ROUTES[$stepName];

        if($requestedStep != 7  && $itemOrder) {

            $current = $itemOrder->getOrderStep();

            if ($requestedStep > $current + 1) {
                $event->setResponse(new RedirectResponse($this->urlGenerator->generate( $this->getNextStep($current))));
            }
        }
        elseif (!$itemOrder && !in_array($requestedStep, [1,7,8])){

            $event->setResponse(new RedirectResponse($this->urlGenerator->generate('bowl_list')));
        }
    }

    private function getNextStep($step): string
    {
       return array_search($step+1, CheckoutUtil::CHECKOUT_ROUTES);
    }
}