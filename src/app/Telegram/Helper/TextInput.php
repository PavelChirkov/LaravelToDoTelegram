<?php

namespace App\Telegram\Helper;

use DefStudio\Telegraph\Facades\Telegraph;

class TextInput
{
    public static function print($text){
        Telegraph::message($text)->send();
    }
}
