<?php

namespace App\Service;

use App\Repository\LoggerRepository;

class LoggerService
{
    private LoggerRepository $loggerRepository;

    public function __construct(LoggerRepository $loggerRepository)
    {
        $this->loggerRepository = $loggerRepository;
    }



}