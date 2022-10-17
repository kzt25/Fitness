<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
