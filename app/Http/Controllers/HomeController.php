<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberHistory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
       $user=New User();
       $user_member_type_level=$request->member_type_level;
       $user->name=$request->name;
       $user->phone=$request->phone;
       $user->email=$request->email;
       $user->password=$request->password;
       $user->member_type_level=$request->member_type_level;
       $user->save();
       $user->members()->attach($request->member_id, ['member_type_level' => $user_member_type_level]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(1);
        $mem = $user->members()->get();
        $users=User::with('members')->orderBy('created_at','DESC')->get();

        return view('home',compact('users','user','mem'));
    }
}
