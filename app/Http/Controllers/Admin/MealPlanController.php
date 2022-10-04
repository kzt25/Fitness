<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MealPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.Meal.mealPlan');
    }
    public function getmealplan(){
        $mealPlan = MealPlan::query();
        return Datatables::of($mealPlan)
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $delete_icon = '';

                $edit_icon = '<a href=" ' . route('trainer.edit', $each->id) . ' " class="text-success mx-1 " title="edit">
                <i class="fa-solid fa-edit fa-xl" data-id="' . $each->id . '"></i>
            </a>';
                $delete_icon = '<a href=" ' . route('trainer.destroy', $each->id) . ' " class="text-danger mx-1 " title="delete">
                <i class="fa-solid fa-trash fa-xl" data-id="' . $each->id . '"></i>
            </a>';

                return '<div class="d-flex justify-content-center">' . $edit_icon . $delete_icon. '</div>';
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
