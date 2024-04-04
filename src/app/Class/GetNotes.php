<?php

namespace App\Class;

use App\Models\Note;

class GetNotes
{
  public static function board(int $id){
      return Note::where('board_id',$id)->get();
  }
}
