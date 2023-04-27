<?php

namespace App\Servises;

use App\Events\MessageSend;
use App\Models\Message;

class MessageService
{
    public function getAllMessages(){
        return Message::query()
            ->with('user')->get();
    }

    public function createMessage($data){

        $message = Message::create([
            'text'=>$data['text'],
            'user_id'=>$data['user_id']
        ]);

        broadcast(new MessageSend(request()->user(),$message));

        return $message;
    }
}


