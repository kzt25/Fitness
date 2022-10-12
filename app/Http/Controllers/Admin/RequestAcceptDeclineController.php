<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RequestAcceptDeclineController extends Controller
{
    public function accept($id){
        $user=User::findOrFail($id);
        $user_member_type=$user->member_type;
        $member=Member::findOrFail($user_member_type);
        $user_member_role_id=$member->role_id;
        $role=Role::findOrFail($user_member_role_id);
        $user->assignRole($role->name);
    }
}
