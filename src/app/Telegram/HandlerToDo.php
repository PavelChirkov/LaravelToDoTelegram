<?php

namespace App\Telegram;

use App\Class\DeleteNode;
use App\Class\GetNotes;
use App\Class\SetNote;
use App\Models\Board;
use App\Models\Note;
use App\Telegram\Class\Notes;
use App\Telegram\Class\OneNote;
use App\Telegram\Helper\TextInput;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;

class HandlerToDo extends WebhookHandler
{
    public function start():void
    {
        $this->reply('start');
    }
    public function hey():void
    {
        $this->reply('hey');
    }
    public function board():void
    {
        Notes::telegramNote(1,'viewnote');
    }
    public function viewnote():void
    {
        OneNote::view($this->data->get('id'));
    }
    public function newnote():void
    {
        $text = json_encode($this->data, JSON_UNESCAPED_UNICODE);
        TextInput::print("Добавьте заголовок");
        $this->chat->storage()->set('action','create_title');
        $this->chat->storage()->set('id',$this->data->get('id'));
    }
    public function deletenote(){
        DeleteNode::on($this->data->get('id'));
        Telegraph::message('Удалена')->send();
    }
    public function handleChatMessage(Stringable $text): void
    {
        if($this->chat->storage()->get('action') == 'create_title'){
            TextInput::print("Заголовок добавлен");
            $this->chat->storage()->set('name',$text);
            $this->chat->storage()->set('action','create_text');
            TextInput::print("Добавьте текст");
        }
        else if($this->chat->storage()->get('action') == 'create_text'){
            SetNote::insert($this->chat->storage()->get('name'),$text,1);
            $this->chat->storage()->set('action','view');
            $this->chat->storage()->set('name',"NULL");
            TextInput::print("Запись добавлена");
            TextInput::print("Контекст очищен");
        }else{
            TextInput::print($text);
        }
    }

}
