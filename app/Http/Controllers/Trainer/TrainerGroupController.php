<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\TrainingGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TrainerGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_type' => 'required',
            'group_name' => 'required',
            'group_type'=>'required',
            'member_type_level'=>'required',
            'gender'=>'required'
        ]);
        $training_group=New TrainingGroup();
        $training_group->trainer_id=$request->trainer_id;
        $training_group->member_type=$request->member_type;
        $training_group->group_name=$request->group_name;
        $training_group->group_type=$request->group_type;
        $training_group->member_type_level=$request->member_type_level;
        $training_group->gender=$request->gender;

        $training_group->save();
        $groups=TrainingGroup::where('trainer_id',auth()->user()->id)->get();
        $members=Member::groupBy('member_type')
                ->where('member_type','!=','Free')
                ->get();
        return redirect()->route('trainer',compact('groups','members'))->with(
        'success','New Training Group is created successfully');
    }

    public function chat_show($id)
    { $messages=DB::select('select * from messages');
        $group_chat=TrainingGroup::findOrFail($id);
        return response()
            ->json([
                'group_chat' => $group_chat,
                'messages'=>$messages
        ]);
    }
}
