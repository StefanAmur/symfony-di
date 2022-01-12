<?php

namespace App\Entity;

interface ITransform
{
    public function transform(String $string): String;
};
