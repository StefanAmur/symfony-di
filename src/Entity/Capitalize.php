<?php

namespace App\Entity;

class Capitalize implements ITransform
{
    // works somewhat ok but starts each word with capital letter
    //
    // public function transform(String $string): String
    // {

    //     $capString = strtolower($string);

    //     for ($i = 0, $len = strlen($capString); $i < $len; $i += 2)
    //     {
    //         $capString[$i] = strtoupper($capString[$i]);
    //     }

    //     return $capString;
    // }

    // this maybe works better, idk, 
    // both found at https://stackoverflow.com/questions/7153801/how-to-capitalize-every-other-character-in-php
    public function transform(String $string): String
    {

        $return = "";
        foreach (explode(" ", $string) as $w)
        {
            foreach (str_split($w) as $k => $v)
            {
                if (($k + 1) % 2 != 0 && ctype_alpha($v))
                {
                    $return .= mb_strtoupper($v);
                }
                else
                {
                    $return .= $v;
                }
            }
            $return .= " ";
        }
        return $return;
    }
}
