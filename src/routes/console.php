<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('telegrambot',function(){
    /** @var  \DefStudio\Telegraph\Models\TelegraphBot $bot */
    $bot = \DefStudio\Telegraph\Models\TelegraphBot::find(1);
    $bot->registerCommands([
        '/start' => 'Начнем пользоваться',
        '/board' => 'Доска ToDo',
        '/about' => 'О боте'
    ])->send();
});
