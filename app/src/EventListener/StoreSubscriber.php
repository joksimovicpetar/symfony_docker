<?php

namespace App\EventListener;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\VarDumper\VarDumper;

class StoreSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::TERMINATE => [
                ['onKernelResponsePre', 10],
                ['onKernelResponsePost', -10],
            ],
            QuantityChangeEvent::class => 'onQuantityChange',
        ];
    }

    public function onKernelResponsePre(ResponseEvent $event)
    {
        // ...
    }

    public function onKernelResponsePost(ResponseEvent $event)
    {
        // ...
    }

    public function onQuantityChange(QuantityChangeEvent $event)
    {
        VarDumper::dump("usao");exit;
    }
}