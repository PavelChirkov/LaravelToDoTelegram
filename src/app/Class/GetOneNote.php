<?php

namespace App\Class;

use App\Models\Note;

class GetOneNote
{
    public static function view($id){
        return Note::where('id',$id)->first()->description;
    }
}
