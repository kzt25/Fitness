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
               ->addColumn('action',function($member){
                return '<a class="btn btn-success btn-sm text-white edit" data-id='.$member->id.' onclick="return confirm(`Are you sure you want to delete this ?`)">Edit</a>
                        <a class="btn btn-danger btn-sm text-white delete" data-id='.$member->id.' onclick="return confirm(`Are you sure you want to delete this ?`)">Delete</a>';
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
       return redirect()->back();
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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $member=Member::findOrFail($id);
        $member->delete();
        return 'success';
    }
}
