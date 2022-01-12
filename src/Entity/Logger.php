<?php

namespace App\Entity;

class Logger
{
    public function log(String $message)
    {
        error_log(PHP_EOL . $message, 3, '../log.info');
    }
}
