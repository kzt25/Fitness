<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.users.index');
    }

    public function ssd()
    {
        $users = User::query();

        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format("Y-m-d H:i:s");
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $detail_icon = '';
                $delete_icon = '';

                $edit_icon = '<a href=" ' . route('user.edit', $each->id) . ' " class="text-warning mx-1 " title="edit">
                                    <i class="fa-solid fa-edit fa-xl"></i>
                              </a>';
                $detail_icon = '<a href=" ' . route('user.show', $each->id) . ' " class="text-info mx-1" title="detail">
                                    <i class="fa-solid fa-circle-info fa-xl"></i>
                                </a>';

                $delete_icon = '<a href=" ' . route('user.destroy', $each->id) . ' " class="text-danger mx-1              delete-btn" title="delete"  data-id="' . $each->id . '" >
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
        //
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
