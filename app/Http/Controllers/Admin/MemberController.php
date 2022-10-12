<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\MealPlan;
use GrahamCampbell\ResultType\Success;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.member.index');
    }


    public function ssd() {
        $members = Member::query()->where('member_type','!=','Free');
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
        $roles=Role::all();
        return view('admin.member.create',compact('roles'));
    }


    public function store(Request $request)
    {
      //  dd($request->role_id);
       $member_store=New Member();
       $member_store->member_type=$request->member_type;
       $member_store->duration=$request->duration;
       $member_store->price=$request->price;
       $member_store->role_id=$request->role_id;

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
        $roles=Role::where('name','!=','Free')->get();
        return view('admin.member.edit',compact('member_edit','roles'));
    }


    public function update(Request $request, $id)
    {
        $member_update=Member::findOrFail($id);
        $member_update->member_type=$request->member_type;
        $member_update->duration=$request->duration;
        $member_update->role_id=$request->role_id;
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
