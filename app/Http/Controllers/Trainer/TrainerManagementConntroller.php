<?php

namespace App\Http\Controllers\Trainer;

use App\Events\TrainingMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

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
