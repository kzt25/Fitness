<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\MealPlanRequest;

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
        return view('admin.MealPlan.index');
    }
    public function getmealplan(){
        $mealPlan = MealPlan::query()->with(['member']);
        return Datatables::of($mealPlan)
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $delete_icon = '';

                $edit_icon = '<a href=" ' . route('mealplan.edit', $each->id) . ' " class="text-success mx-1 " title="edit">
                <i class="fa-solid fa-edit fa-xl" data-id="' . $each->id . '"></i>
            </a>';
                $delete_icon = '<a href=" ' . route('mealplan.delete', $each->id) . ' " class="text-danger mx-1" id="delete" title="delete">
                <i class="fa-solid fa-trash fa-xl delete" data-id="' . $each->id . '"></i>
            </a>';

                return '<div class="d-flex justify-content-center">' . $edit_icon . $delete_icon. '</div>';
            })
            // ->removeColumn('id')
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
        $member = Member::All();
        // dd($member);
        return view('admin.MealPlan.create',compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealPlanRequest $request)
    {
        //
        $mealPlan = new MealPlan();
        $mealPlan->member_id = $request->member_id;
        $mealPlan->meal_plan_type = $request->meal_plan_type;
        $mealPlan->save();
        return redirect()->route('mealplan.index')->with('success', 'New Meal Plan is created successfully!');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $member = Member::All();
        $mealplan = MealPlan::findOrFail($id);
        return view('admin.MealPlan.edit', compact('mealplan','member'));
    }

   
    public function update(MealPlanRequest $request, $id)
    {
        //
        $mealPlan_update=MealPlan::findOrFail($id);
        $mealPlan_update->member_id = $request->member_id;
        $mealPlan_update->meal_plan_type = $request->meal_plan_type;
        $mealPlan_update->update();
        return redirect()->route('mealplan.index')->with('success', 'Meal Plan is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mealPlan_delete=MealPlan::findOrFail($id);
        $mealPlan_delete->delete();
        return redirect()->route('mealplan.index')->with('success', 'Meal Plan is Deleted successfully!');
    }
}
