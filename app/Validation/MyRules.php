<?php

namespace App\Validation;

class MyRules
{
    public function korean_alpha_dash($str)
    {
        return ( preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9a-zA-Z_-]/u',$str)) ? false : true;
    }
}