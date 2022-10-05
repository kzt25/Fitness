<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trainers.index');
    }

    public function ssd()
    {
        $trainers = Trainer::query();
        $id = 0;
        return Datatables::of($trainers)
            ->editColumn('training_type', function ($each) {
                $training_type = "";
                if ($each->training_type == 'weight_loss') {
                    $training_type = 'Weight Loss';
                } elseif ($each->training_type == 'weight_gain') {
                    $training_type = 'Weight Gain';
                } else {
                    $training_type = 'Body Beauty';
                }
                return $training_type;
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $detail_icon = '';
                $delete_icon = '';

                $edit_icon = '<a href=" ' . route('trainer.edit', $each->id) . ' " class="text-warning mx-1 " title="edit">
                <i class="fa-solid fa-edit fa-xl"></i>
            </a>';
                $detail_icon = '<a href=" ' . route('trainer.show', $each->id) . ' " class="text-info mx-1 " title="detail">
                    <i class="fa-solid fa-circle-info fa-xl"></i>
                </a>';

                $delete_icon = '<a href=" ' . route('trainer.destroy', $each->id) . ' " class="text-danger mx-1 delete-btn" data-id="' . $each->id . '" title="delete">
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
        return view('admin.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrainerRequest $request)
    {
        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->training_type = $request->training_type;
        $trainer->address = $request->address;

        $trainer->save();

        return redirect()->route('trainer.index')->with('success', 'New Trainer is created successfully!');
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
        $trainer = Trainer::findOrFail($id);
        return view('admin.trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainerRequest $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->training_type = $request->training_type;
        $trainer->address = $request->address;

        $trainer->update();

        return redirect()->route('trainer.index')->with('success', 'Trainer is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return 'success';
    }
}
