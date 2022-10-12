<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.request.member_request');
    }

    public function ssd()
    {
        $memberRequest = User::where('active_status',1)->get();
        return Datatables::of($memberRequest)
            ->addIndexColumn()
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $detail_icon = '';
                $delete_icon = '';
                $edit_icon = '<a href=" ' . route('requestaccept', $each->id) . ' " class="text-warning mx-1 " title="edit">
                                    <i class="fa-solid fa-edit fa-xl"></i>
                              </a>';

                $delete_icon = '<a href=" ' . route('requestdecline', $each->id) . ' " class="text-danger mx-1              delete-btn" title="delete"  data-id="' . $each->id . '" >
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </a>';

                return '<div class="d-flex justify-content-center">' .  $detail_icon  . $edit_icon . $delete_icon . '</div>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
