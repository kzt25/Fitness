<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Message;
use App\Models\TrainingUser;
use Illuminate\Http\Request;
use App\Models\TrainingGroup;
use App\Http\Controllers\Controller;

class TrainingGroupController extends Controller
{
    //
    public function getTrainningGroups()
    {
        $user = auth()->user();
        $training_groups = TrainingGroup::where('user_id', $user->id)->get();

        return response()->json([
            'message' => 'success',
            'training_groups' => $training_groups
        ]);
    }

    public function createTrainingGroup(Request $request)
    {
        $user = auth()->user();

        $training_group = new TrainingGroup();
        $training_group->user_id = $user->id;
        $training_group->member_type = $request->member_type;
        $training_group->member_type_level = $request->proficiency;
        $training_group->group_name = $request->group_name;
        $training_group->gender = $request->gender;
        $training_group->group_type = $request->group_type;

        $training_group->save();

        return response()->json([
            'message' => 'New Training Group Created Successfully',
            'training_group' => $training_group
        ]);
    }

    public function deleteTrainingGroup(Request $request) // still need to write a little things
    {
        $group_users = TrainingUser::where('training_group_id', $request->group_id)->get();
        foreach ($group_users as $group_user) {
            User::where('id', $group_user->user_id)->update(["ingroup" => 0]);
        }

        $group_user_delete = TrainingUser::where('training_group_id', $request->group_id);
        $group_user_delete->delete();
        $group_message_delete = Message::where('training_group_id', $request->group_id);
        $group_message_delete->delete();
        $group_delete = TrainingGroup::where('id', $request->group_id);
        $group_delete->delete();

        return response()->json([
            'message' => 'Success Deleted!'
        ]);
    }

    public function trainingGroupViewMedia(Request $request) // view media
    {
        $training_group_id = $request->id;
        $medias = Message::where('training_group_id', $training_group_id)->whereNotNull('media')->get();
        return response()->json([
            'message' => 'success',
            'medias' => $medias
        ]);
    }

    // MH style
    public function memberForTrainingGroup(Request $request) // for search
    {
        $group_id = $request->id;

        $group = TrainingGroup::where('id', $group_id)->first();

        if ($group->group_type == 'weightLoss') {
            $members = User::where('ingroup', '!=', 1)
                ->where('active_status', 2)
                ->where('member_type', $group->member_type)
                ->where('membertype_level', $group->member_type_level)
                ->where('gender', $group->gender)
                ->where('bmi', '>=', 25)
                ->get();

            return response()->json([
                'message' => 'success',
                'members' => $members
            ]);
        }

        if ($group->group_type == 'WeightGain') {
            $members = User::where('ingroup', '!=', 1)
                ->where('active_status', 2)
                ->where('member_type', $group->member_type)
                ->where('membertype_level', $group->member_type_level)
                ->where('gender', $group->gender)
                ->where('bmi', '<=', 18.5)
                ->get();

            return response()->json([
                'message' => 'success',
                'members' => $members
            ]);
        }

        if ($group->group_type == 'bodyBeauty') {
            $members = User::where('ingroup', '!=', 1)
                ->where('active_status', 2)
                ->where('member_type', $group->member_type)
                ->where('membertype_level', $group->member_type_level)
                ->where('gender', $group->gender)
                ->whereBetween('bmi', [18.5, 24.9])
                ->get();

                return response()->json([
                    'message' => 'success',
                    'members' => $members
                ]);
        }
    }

    public function viewMembers() {
        $training_users = TrainingUser::with('group.user')->get();

        return response()->json([
            'message' => 'success',
            'training_users' => $training_users
        ]);
    }
    // public function viewMemberProfile(Request $request) {
    //     $id = $request->id;
    //     $user = User::findOrFail($id);
    //     return response()->json([
    //         'user' => $user
    //     ]);
    // }

    // MH style
    public function addMember(Request $request)
    {
        $id = $request->id;
        $group_id = $request->group_id;
        $member = User::findOrFail($id);
        $member->ingroup = 1;
        $member->update();
        $member->tainer_groups()->attach($group_id);

        return response()->json([
            'message' => 'success',
            'user' => $member
        ]);
    }


    public function kickMember(Request $request)
    {
        $id = $request->id;
        $group_id = $request->group_id;
        $member = User::findOrFail($id);
        $member->ingroup = 0;
        $member->update();
        $member->tainer_groups()->detach($group_id);

        return response()->json([
            'message' => 'success'
        ]);
    }

    // public function kick($id)
    // {
    //     $member_kick=DB::table('training_users')
    //                     ->where('user_id',$id)
    //                     ->delete();

    //     $member_user=User::findOrFail($id);

    //     $member_user->ingroup=0;
    //     $member_user->update();

    //     return response()->json(['message'=>'Kick Member Successfully']);

    //     //return redirect()->back()->with('success','Kick Member Successfully');

    // }
}
