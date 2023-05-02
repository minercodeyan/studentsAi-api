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

        $user = \request()->user('api');

        $message = Message::create([
            'message'=>$data['text'],
            'user_id'=>$user->id,
        ]);

        broadcast(new MessageSend($user,$message));

        return $message;
    }
}


