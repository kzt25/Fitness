<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\TrainingGroup;
use App\Http\Controllers\Controller;

class TrainerManagementConntroller extends Controller
{
    //
    public function index()
    {
        $members=Member::groupBy('member_type')
                        ->where('member_type','!=','Free')
                        ->get();
        $groups=TrainingGroup::where('trainer_id',auth()->user()->id)->get();
        return view('Trainer.index',compact('members','groups'));
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
