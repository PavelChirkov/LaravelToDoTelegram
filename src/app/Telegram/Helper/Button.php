<?php

namespace App\Telegram\Helper;

class Button
{
    public static function create(string $text, string $action, string $namePagam, string $valueParam ){
        return \DefStudio\Telegraph\Keyboard\Button::make($text)->action($action)->param($namePagam, $valueParam);
    }
}
