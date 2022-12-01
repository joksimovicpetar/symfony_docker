<?php

namespace App\EventListener;

use App\Service\LoggerService;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\VarDumper\VarDumper;

class StoreSubscriber implements EventSubscriberInterface
{
    private $callable = [];
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::TERMINATE => 'onKernelTerminate',
            QuantityChangeEvent::class => 'onQuantityChange',
        ];
    }

    public function onKernelTerminate(TerminateEvent $event)
    {
        if (\count($this->callable)) {
            foreach ($this->callable as $key => $callable) {
                $callable();
                unset($this->callable[$key]);
            }
        }
    }

    public function onQuantityChange(QuantityChangeEvent $quantityChangeEvent)
    {
//        VarDumper::dump($quantityChangeEvent);exit;
        $this->callable[] = fn() => $this->loggerService->save($quantityChangeEvent);
    }
}