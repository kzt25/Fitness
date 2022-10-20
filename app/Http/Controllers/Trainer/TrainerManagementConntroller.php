<?php

namespace App\Http\Controllers\Trainer;


use App\Models\Meal;
use App\Models\User;
use App\Models\Member;

use App\Models\Message;


use Illuminate\Http\Request;

use App\Models\TrainingGroup;
use App\Events\TrainingMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\TrainingUser;
use RealRashid\SweetAlert\Facades\Alert;

class TrainerManagementConntroller extends Controller
{
    //
    public function index()
    {
        $messages = Message::all();
        $members=Member::groupBy('member_type')
                        ->where('member_type','!=','Free')
                        ->get();
        $groups=TrainingGroup::where('trainer_id',auth()->user()->id)->get();
        return view('Trainer.index',compact('messages','members','groups'));
    }

    public function send(Request $request)
    {
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

    public function view_member($id)
    {
        $members=Member::groupBy('member_type')
        ->where('member_type','!=','Free')
        ->get();

        $group_id = $id;
        $group = TrainingGroup::where('id',$group_id)->first();
        // dd($group);
           if($group->group_type === 'weightLoss'){
            $member = User::where('ingroup' , '!=',1)
            ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->where('bmi','>=',25)
            ->get();

           }

           if($group->group_type === 'weightGain'){
            $member = User::where('ingroup' , '!=',1)
            ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->where('bmi','<=',18.5)
            ->get();

           }

           if($group->group_type === 'bodyBeauty'){
           $member = User::where('ingroup' , '!=',1)
           ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->whereBetween('bmi', [18.5, 24.9])
            ->get();

           }
        return view('Trainer.view_member',compact('member','members','group'));
    }

    public function addMember(Request $request)
    {
        $id = $request->id;
        $group_id = $request->group_id;
        $member = User::findOrFail($id);
        $member->ingroup = 1;
        $member->update();
        $member->tainer_groups()->attach($group_id);
        return redirect()->back()->with('popup', 'open');
    }


    public function showMember(Request $request)
    {
        $group_id =  $request->id;
        $group = TrainingGroup::where('id',$group_id)->first();

        if($group->group_type === 'weightLoss'){
            $members = User::where('ingroup' , '!=',1)
            ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->where('bmi','>=',25)
            ->get();

           }

           if($group->group_type === 'weightGain'){
            $members = User::where('ingroup' , '!=',1)
            ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->where('bmi','<=',18.5)
            ->get();

           }

           if($group->group_type === 'bodyBeauty'){
           $members = User::where('ingroup' , '!=',1)
           ->where('active_status',2)
            ->where('member_type',$group->member_type)
            ->where('membertype_level',$group->member_type_level)
            ->where('gender',$group->gender)
            ->whereBetween('bmi', [18.5, 24.9])
            ->get();

           }
        if($request->keyword != ''){
            if($group->group_type === 'weightLoss'){
                $members = User::where('ingroup' , '!=',1)
                ->where('active_status',2)
                ->where('member_type',$group->member_type)
                ->where('membertype_level',$group->member_type_level)
                ->where('gender',$group->gender)
                ->where('bmi','>=',25)
                ->where('name','LIKE','%'.$request->keyword.'%')
                ->get();
               }

               if($group->group_type === 'weightGain'){
                $members = User::where('ingroup' , '!=',1)
                ->where('active_status',2)
                ->where('member_type',$group->member_type)
                ->where('membertype_level',$group->member_type_level)
                ->where('gender',$group->gender)
                ->where('bmi','<=',18.4)
                ->where('name','LIKE','%'.$request->keyword.'%')
                ->get();
               }

               if($group->group_type === 'bodyBeauty'){
               $members = User::where('ingroup' , '!=',1)
               ->where('active_status',2)
                ->where('member_type',$group->member_type)
                ->where('membertype_level',$group->member_type_level)
                ->where('gender',$group->gender)
                ->whereBetween('bmi', [18.5, 24.9])
                ->where('name','LIKE','%'.$request->keyword.'%')
                ->get();
               }

            //$members = User::where('name','LIKE','%'.$request->keyword.'%')->get();
        }
        //dd($members);
        return response()->json([
           'members' => $members
        ]);
    }
    public function destroy(Request $request)
    {
        $group_users = TrainingUser::where('training_group_id',$request->group_id)->get();
        foreach($group_users as $gu){
            User::where('id',$gu->user_id)->update(["ingroup" => 0]);
        }

        $group_user_delete = TrainingUser::where('training_group_id',$request->group_id);
        $group_user_delete->delete();
        $group_delete = TrainingGroup::where('id',$request->group_id);
        $group_delete->delete();
        Alert::success('Success', 'Group Deleted!');
        return redirect('trainer');
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
