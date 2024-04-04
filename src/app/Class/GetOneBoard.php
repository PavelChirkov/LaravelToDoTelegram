<?php

namespace App\Class;

use App\Models\Board;

class GetOneBoard
{
    public static function board($id = 0){
        $board = Board::where('id',$id)->first();
        return "<b>".$board->name."</b>\n".$board->description;
    }
}
