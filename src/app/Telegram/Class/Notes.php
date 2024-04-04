<?php

namespace App\Telegram\Class;

use App\Class\GetOneBoard;
use App\Class\GetNotes;
use App\Models\Note;
use App\Telegram\Helper\Keyboard;
use App\Telegram\Helper\OneKeyKeyboard;

class Notes
{
    public static function telegramNote(int $id,string $action)
    {
        $notes = GetNotes::board($id);
        $notes[] = new class($id) {
            public $id = 1;
            public $name = "✎ Создать запись";
            public $board_id ;
            public $action = "newnote";
            public function __construct($id)
            {
                $this->board_id = $id;
            }

        };
        Keyboard::create(GetOneBoard::board($id),$notes,$action);

    }
}
