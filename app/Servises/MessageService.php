<?php

namespace App\Servises;

use App\Events\MessageSend;
use App\Http\Resources\MessageDTO;
use App\Models\Message;
use App\Models\User;


class MessageService
{
    public function getGroupMessages(){

        $user = \request()->user('api');
        $ids = User::query()->where('group_id',$user->group_id)->pluck('id')->toArray();

        return Message::query()
            ->with('user')->whereIn('user_id',$ids)->get();
    }

    public function createMessage($data){

        $user = \request()->user('api');

        $message = Message::create([
            'message'=>$data['text'],
            'user_id'=>$user->id,
        ]);


        broadcast(new MessageSend([
            'id'=>$message->id,
            'text' => $message->message,
            'user'=>$user,
            'localDate'=>$message->created_at
        ]));

        return $message;
    }
}


