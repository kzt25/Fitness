<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    public function ssd()
    {
        $roles = Role::query();
        return Datatables::of($roles)
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $detail_icon = '';
                $delete_icon = '';

                $edit_icon = '<a href=" ' . route('role.edit', $each->id) . ' " class="text-warning mx-1 " title="edit">
                                <i class="fa-solid fa-edit fa-xl"></i>
                             </a>';
                // $detail_icon = '<a href=" ' . route('permission.show', $each->id) . ' " class="text-info mx-1 " title="detail">
                //     <i class="fa-solid fa-circle-info fa-xl"></i>
                // </a>';

                $delete_icon = '<a href=" ' . route('role.destroy', $each->id) . ' " class="text-danger mx-1                delete-btn"  data-id="' . $each->id . '" title="delete">
                            <i class="fa-solid fa-trash fa-xl"></i>
                                </a>';

                return '<div class="d-flex justify-content-center">' .   $edit_icon . $delete_icon . '</div>';
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
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;

        $role->save();

        return redirect()->route('role.index')->with('success', 'New Role is created successfully!');
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
