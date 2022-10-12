<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PassResetController extends Controller
{
    //
    public function passReset(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'password' => 'required|min:6|max:9',
        //     'password_confirmation' => 'required|same:password'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'message' => 'Validation Error!',
        //         'data' => $validator->errors()
        //     ]);
        // }

        $user = User::where('phone', $request->phone)->first();
        if($user == $request->phone){
            return Redirect()->back()->with('phone', 'This Number exist !');
        }
        else{
            return Redirect()->back()->with('phone', 'This Number does not exist !');
        }
        // if ($user) {
        //     $user->password = Hash::make($request->password);
        //     $user->save();

        //     return response()->json([
        //         'status' => 200,
        //         'message' => "You have changed password successfully",
        //         'data' => $user
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 403,
        //         'message' => 'Your phone is not in our database'
        //     ]);
        // }

    return view ('auth.passReset');
    }
}
