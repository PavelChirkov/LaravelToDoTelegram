<?php

namespace App\Telegram\Helper;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Keyboard as Tkeyboard;
use Illuminate\Support\Facades\Log;

class OneKeyKeyboard
{
    public static function create($text, $name, $id, $action)
    {

        $button[] = \App\Telegram\Helper\Button::create($name, $action, "id", $id);
        Telegraph::message($text)->keyboard(Tkeyboard::make()->buttons($button)->chunk(1))->send();
    }
}
