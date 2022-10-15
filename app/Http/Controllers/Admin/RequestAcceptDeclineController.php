<?php

namespace App\Http\Controllers\Admin;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberHistory;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestAcceptDeclineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function accept($id, Request $request){
        $u=User::findOrFail($id);
        //$user = Auth::user()->id;

        $member_history = MemberHistory::where('user_id',$u->id)->first();
        $member_role = Member::where('id',$member_history->member_id)->first();

        $role=Role::findOrFail($member_role->role_id);

        $u->assignRole($role->name);
        $u->active_status=2;
        $u->update();

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = "Admin is accepted your request. Congratulation !";

        $pusher->trigger('memberaccept', 'App\\Events\\Noti', $data);

        return back()->with('sucess','Accepted');
    }
    public function decline($id){
        $user = User::findOrFail($id);
        $member_history = MemberHistory::where('user_id',$user->id)->first();

        $member_role = Member::where('id',$member_history->member_id)->first();
        $role=Role::findOrFail($member_role->role_id);
        $user->assignRole($role->name);
        $user->active_status=0;
        $user->update();

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = "Admin is declined your request. Please try again !";

        $pusher->trigger('memberaccept', 'App\\Events\\Noti', $data);

        return back()->with('success','Declined');
    }
}
