<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberHistory;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RequestAcceptDeclineController extends Controller
{
    public function accept($id, Request $request){
        $u=User::findOrFail($id);

        $member_history = MemberHistory::where('user_id',$u->id)->first();
        $member_role = Member::where('id',$member_history->member_id)->first();

        $role=Role::findOrFail($member_role->role_id);

        $u->assignRole($role->name);
        $u->active_status=2;
        $u->update();
        return back();
    }
    public function decline($id){
        $user = User::findOrFail($id);
        $member_history = MemberHistory::where('user_id',$user->id)->first();

        $member_role = Member::where('id',$member_history->member_id)->first();
        $role=Role::findOrFail($member_role->role_id);
        $user->assignRole($role->name);
        $user->active_status=0;
        $user->update();
        return back();
    }
}
