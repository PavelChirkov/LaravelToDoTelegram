<?php

namespace App\Telegram\Helper;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard as Tkeyboard;
use Illuminate\Support\Facades\Log;

class Keyboard
{
    public static function create($text, $value, $action)
    {
        $button = [];

        foreach ($value as $row) {

            if(isset($row->action)) $action=$row->action;
            $button[] = \App\Telegram\Helper\Button::create($row->name, $action, "id", $row->id);

        }

        Log::info(json_encode($value, JSON_UNESCAPED_UNICODE));
        Telegraph::message($text)->keyboard(Tkeyboard::make()->buttons($button)->chunk(1))->send();
    }
}
