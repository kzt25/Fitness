<?php

namespace App\Http\Controllers\Admin;

//use DataTables;
use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.Meal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meal_plan_type = MealPlan::All();
        // dd($member);
        return view('admin.Meal.create',compact('meal_plan_type'));
    }
    public function getMeal() {
        $meal = Meal::query();
        return Datatables::of($meal)
        ->addColumn('action', function ($each) {
            $edit_icon = '';
            $delete_icon = '';

            $edit_icon = '<a href=" ' . route('meal.edit', $each->id) . ' " class="text-success mx-1 " title="edit">
            <i class="fa-solid fa-edit fa-xl" data-id="' . $each->id . '"></i>
        </a>';
            $delete_icon = '<a href=" ' . route('meal.delete', $each->id) . ' " class="text-danger mx-1" id="delete" title="delete">
            <i class="fa-solid fa-trash fa-xl delete" data-id="' . $each->id . '"></i>
        </a>';

            return '<div class="d-flex justify-content-center">' . $edit_icon . $delete_icon. '</div>';
        })
        ->make(true);
            //    ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealRequest $request)
    {
        $meal_create = new Meal();
        $meal_create->name = $request->name;
        $meal_create->calories = $request->calories;
        $meal_create->meal_plan_id = $request->meal_plan_id;
        $meal_create->save();
        return redirect()->route('meal.index')->with('success', 'New Meal is created successfully!');
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
        $meal_plan_type = MealPlan::All();
        $meal = Meal::findOrFail($id);
        return view('admin.Meal.edit', compact('meal','meal_plan_type'));
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
        $meal_update = Meal::findOrFail($id);
        $meal_update->name = $request->name;
        $meal_update->calories = $request->calories;
        $meal_update->meal_plan_id = $request->meal_plan_id;
        $meal_update->update();
        return redirect()->route('meal.index')->with('success', 'Meal is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal_delete=Meal::findOrFail($id);
        $meal_delete->delete();
        return redirect()->route('meal.index')->with('success', 'Meal is Deleted successfully!');
    }
}
