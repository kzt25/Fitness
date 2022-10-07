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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        // $mmhs=MemberHistory::all();
        // $members=Member::all();
        // $membHist = MemberHistory::groupBy('user_id')->latest()->get();
        // // dd($membHist);
        // $membHist = MemberHistory::select(DB::raw('t.*'))
        //     ->from(DB::raw('(SELECT * FROM member_histories ORDER BY created_at DESC) t'))
        //     ->groupBy('t.user_id')
        //     ->get();
        $users=User::all();
        return view('home',compact('users'));
    }
}
