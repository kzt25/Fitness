<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index');
    }


    public function ssd() {
        $members = Member::query();
        return Datatables::of($members)
        ->addIndexColumn()
        ->addColumn('action', function ($each) {
            $edit_icon = '';
            $delete_icon = '';

            $edit_icon = '<a href=" ' . route('member.edit', $each->id) . ' " class="text-success mx-1 " title="edit">
                        <i class="fa-solid fa-edit fa-xl" data-id="' . $each->id . '"></i>
                    </a>';
            $delete_icon = '<a href=" ' . route('member.destroy', $each->id) . ' " class="text-danger mx-1" id="delete" title="delete">
                        <i class="fa-solid fa-trash fa-xl delete" data-id="' . $each->id . '"></i>
                    </a>';

                        return '<div class="d-flex justify-content-center">' . $edit_icon . $delete_icon. '</div>';
                    })
               ->rawColumns(['action'])
               ->make(true);
    }

    public function create()
    {
        return view('admin.member.create');
    }


    public function store(Request $request)
    {
       $member_store=New Member();
       $member_store->user_id=$request->user_id;
       $member_store->member_type=$request->member_type;
       $member_store->member_type_level=$request->member_type_level;
       $member_store->price=$request->price;
       $member_store->save();
       return redirect()->route('member.index')->with('success', 'New Member Type is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $member_edit = Member::findOrFail($id);
        return view('admin.member.edit',compact('member_edit'));
    }


    public function update(Request $request, $id)
    {
        $member_update=Member::findOrFail($id);
        $member_update->user_id=$request->user_id;
        $member_update->member_type=$request->member_type;
        $member_update->member_type_level=$request->member_type_level;
        $member_update->price=$request->price;

        $member_update->update();
        return redirect()->route('member.index')->with('success', 'Member Type is updated successfully!');
    }


    public function destroy($id)
    {
        $member=Member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Member is Deleted successfully!');
    }
}
