<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserWorkoutController extends Controller
{
    public function index(){
        
        return view('user.workoutindex');
    }

    public function getstart(){

        return view('user.workoutstart');
    }
}
