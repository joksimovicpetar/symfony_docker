<?php

namespace App\Service;

use App\Entity\Logger;
use App\EventListener\QuantityChangeEvent;
use App\Repository\LoggerRepository;
use Symfony\Component\VarDumper\VarDumper;

class LoggerService
{
    private LoggerRepository $loggerRepository;

    public function __construct(LoggerRepository $loggerRepository)
    {
        $this->loggerRepository = $loggerRepository;
    }

    public function save(QuantityChangeEvent $quantityChangeEvent){

        $logger = new Logger();
        $logger->setItemOrder($quantityChangeEvent->getItemOrder());
        $logger->setQuantity($quantityChangeEvent->getQuantity());
        try{
            $this->loggerRepository->save($logger);

        } catch (\Exception $e){
            $logger->setQuantity(['Message'=>$e->getMessage()]);
        }
    }



}