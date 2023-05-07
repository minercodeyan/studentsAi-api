<?php

namespace App\Servises;

use App\Mail\GroupMail;
use App\Models\EmailBroadcast;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Prologue\Alerts\Facades\Alert;

class EmailBroadcastService
{
    public function sendGroupMail($id){
        $broadcast= EmailBroadcast::findOrFail($id);

        if($broadcast->is_send){
            Alert::add('error', 'Данная рассылка уже разослана.')->flash();
        }
        else {
            $broadcast->is_send = true;
            $broadcast->save();

            foreach ($broadcast->groups as $group) {
                foreach ($group->users as $user) {
                    if ($user) {
                        usleep(50000);
                        Mail::to($user)->send(new GroupMail($broadcast->title, $broadcast->broadcast_message));
                    }
                }
            }
        }
    }
}
