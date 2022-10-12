<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PersonalChoice;
use App\Http\Controllers\Controller;
use App\Models\BankingInfo;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function checkUserExists(Request $request) {
        $usr_phone = User::where('phone', $request->phone)->first();
        $usr_email = User::where('email', $request->email)->first();

        if ($usr_phone || $usr_email) {
            return response()->json([
                "message" => "Already Registered!"
            ]);
        }else {
            return response()->json([
                "message" => "OK"
            ]);
        }
    }

    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address == $request->address;
        $user->password = Hash::make($request->password);

        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->neck = $request->neck;
        $user->waist = $request->waist;
        $user->hip = $request->hip;
        $user->shoulders = $request->shoulders;
        $user->member_code = 'yc-' . Str::uuid();

        $user->physical_limitation = $request->physical_limitation;
        $user->activities = $request->activities;
        $user->body_type = $request->body_type;
        $user->goal = $request->goal;
        $user->daily_life = $request->daily_life;
        $user->diet_type = $request->diet_type;
        $user->average_night = $request->average_night;
        $user->energy_level = $request->energy_level;
        $user->ideal_weight = $request->ideal_weight;
        $user->most_attention_areas = $request->most_attention_areas;
        $user->physical_activity = $request->physical_activity;
        $user->bad_habits = $request->bad_habits;

        $user->hydration = $request->hydration;
        $user->body_area = $request->body_area;
        // Thandar style start
        $user_member_type_id = $request->member_id;

        $member = Member::findOrFail($user_member_type_id);

        $user_member_type_level = $request->member_type_level;
        $user->membertype_level = $request->member_type_level;
        $user->member_type = $member->member_type;

        $user->save();
        $user->members()->attach($request->member_id, ['member_type_level' => $user_member_type_level]);
        // Thandar style end

        $token = $user->createToken('gym');

        return response()->json([
            'message' => 'Register successfully!',
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }

    public function login() {

    }

    public function logout() {
        $user = auth()->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            "message" => "User successfully logout!"
        ]);
    }

    public function getMemberPlans() {
        $members = Member::all();
        return response()->json([
            'members' => $members
        ]);
    }

    public function getEwalletInfos() {
        $banking_infos = BankingInfo::where('payment_type', 'ewallet')->get();
        return response()->json([
            'banking_infos' => $banking_infos
        ]);
    }
    public function getBankingInfos() {
        $banking_infos = BankingInfo::where('payment_type', 'bank')->get();
        return response()->json([
            'banking_infos' => $banking_infos
        ]);
    }

    public function me() {
        $user = auth()->user();
        $token = $user->currentAccessToken();

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
