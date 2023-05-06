<?php

namespace App\Servises;

use App\Mail\GroupMail;
use App\Models\EmailBroadcast;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailBroadcastService
{
    public function sendGroupMail($id){
        $broadcast= EmailBroadcast::findOrFail($id);

        foreach ($broadcast->groups as $group){
            foreach($group->students as $student){
                $user = User::query()->where('student_id',$student->id)->first();
                if($user){
                    usleep(50000);
                    Mail::to($user)->send(new GroupMail($broadcast->title,$broadcast->broadcast_message));
                }
            }
        }
    }
}
