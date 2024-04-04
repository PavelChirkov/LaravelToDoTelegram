<?php

namespace App\Class;

use App\Models\Note;
use Illuminate\Support\Facades\Log;

class SetNote
{
    public static function insert(string $name, string $text, int $board_id = 1)
    {
        $note = new Note();
        $note->name = $name;
        $note->description = $text;
        $note->board_id = $board_id;
        $note->save();
        Log::info(json_encode($note,JSON_UNESCAPED_UNICODE));
    }
}
