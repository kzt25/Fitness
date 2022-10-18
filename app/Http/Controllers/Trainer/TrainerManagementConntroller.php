<?php

namespace App\Http\Controllers\Trainer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainerManagementConntroller extends Controller
{
    //
    public function index()
    {
        return view('Trainer.index');
    }
    public function free()
    {
        return view('Trainer.free_user');
    }

    public function view_member()
    {
        $member = User::where('ingroup' , '!=',1)->get();
        return view('Trainer.view_member',compact('member'));
    }

    public function addMember($id)
    {
        $member = User::findOrFail($id);
        $member->ingroup = 1;
        $member->update();
        return redirect()->back()->with('popup', 'open');
    }


    public function showMember(Request $request)
    {
        $members = User::where('ingroup' , '!=',1)->get();
        if($request->keyword != ''){
        $members = User::where('name','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
           'members' => $members
        ]);
    }



















    public function platinum()
    {
        return view('Trainer.platinum_user');
    }
    public function diamond()
    {
        return view('Trainer.diamond_user');
    }
    public function gold()
    {
        return view('Trainer.gold_user');
    }
    public function ruby()
    {
        return view('Trainer.ruby_user');
    }
    public function ruby_premium()
    {
        return view('Trainer.ruby_premium_user');
    }

}
