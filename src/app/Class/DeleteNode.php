<?php

namespace App\Class;

use App\Models\Note;

class DeleteNode
{
    public static function on(int $id):void{
        Note::find($id)->delete();
    }
}
