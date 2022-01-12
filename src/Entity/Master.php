<?php

namespace App\Entity;

// use App\Entity\Capitalize;
use App\Entity\Dash;
use App\Entity\ITransform;
use App\Entity\Logger;

class Master
{
    private ITransform $transform;
    private Logger $log;

    public function __construct(ITransform $transform, Logger $log)
    {
        $this->transform = $transform;
        $this->log = $log;
    }

    public function transformAndLog(String $message): String
    {
        $this->log->log($this->transform->transform($message));
        return $this->transform->transform($message);
    }
}
