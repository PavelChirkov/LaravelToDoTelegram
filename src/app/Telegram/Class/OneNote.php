<?php

namespace App\Telegram\Class;

use App\Class\GetOneBoard;
use App\Class\GetOneNote;
use App\Telegram\Helper\Keyboard;
use App\Telegram\Helper\TextInput;

class OneNote
{
    public static function view($id){
        $notes[] = new class($id) {
            public $id = 1;
            public $name = "Удалить запись";
            public $action = "deletenote";
            public function __construct($id)
            {
                $this->id = $id;
            }
        };
        Keyboard::create(GetOneNote::view($id),$notes,"deletenote");
    }
}
