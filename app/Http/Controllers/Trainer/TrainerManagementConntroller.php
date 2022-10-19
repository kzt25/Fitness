<?php

namespace App\Http\Controllers\Trainer;

<<<<<<< HEAD
use App\Events\TrainingMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Message;
=======
use App\Models\User;
>>>>>>> d39be78f7fa231a81ac8d455cf4185fc852e6b7c
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainerManagementConntroller extends Controller
{
    //
    public function index()
    {
        $messages = Message::all();
        return view('Trainer.index', compact('messages'));
    }

    public function send(Request $request)
    {
        dd($request->all());
        event(new TrainingMessageEvent($request->text));

        $message = new Message();
        $message->training_group_id = 1;
        $message->text = $request->text == null ?  null : $request->text;
        $message->media = $request->media == null ? null : $request->media;

        $message->save();
        return "success";
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
