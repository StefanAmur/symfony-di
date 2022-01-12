<?php

namespace App\Entity;

class Dash implements ITransform
{
    public function transform(String $string): String
    {
        return str_replace(" ", "-", $string);
    }
}
