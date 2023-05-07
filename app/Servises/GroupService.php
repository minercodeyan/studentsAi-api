<?php

namespace App\Servises;

use App\Models\Group;

class GroupService
{
    public function findAll(){
        return Group::all();
    }

    public function findUserGroup(){
        $user = \request()->user('api');
        return Group::query()->with('users')->where('id',$user->group_id)->first();
    }
}
