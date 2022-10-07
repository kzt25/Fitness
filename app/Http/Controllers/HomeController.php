<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberHistory;
use Illuminate\Support\Facades\DB;

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
       $user_member_type_id=$request->member_id;
       $user_member_type=Member::findOrFail($user_member_type_id);

       $user_member_type_level=$request->member_type_level;
       $user->name=$request->name;
       $user->phone=$request->phone;
       $user->email=$request->email;
       $user->password=$request->password;
       $user->membertype_level=$request->member_type_level;
       $user->member_type=$user_member_type->member_type;
       $user->save();
       $user->members()->attach($request->member_id, ['member_type_level' => $user_member_type_level]);
       return redirect()->back();

    }

    public function index()
    {
        $user = User::find(1);
        $mem = $user->members()->get();
        $users=User::with('members')->orderBy('created_at','DESC')->get();


        //return view('home',compact('users','user','mem'));
        return view('customer.customer_registration');

    }
}
