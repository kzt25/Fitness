@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Edit Meal</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('meal.update', $meal->id) }}" method="POST" id="edit-meal">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="" for="meal_plan_id">Meal Plan Type</label> <br>
                    <select class="form-control " name="meal_plan_id" id="meal_plan_id">
                        <option value="{{$meal->meal_plan_id}}">{{$meal->meal_plans->meal_plan_type}}</option>
                        @foreach($meal_plan_type as $meal_plan)
                        <option value="{{$meal_plan->id}}">{{$meal_plan->meal_plan_type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label for="name">Meal Name</label>
                    <input type="text" class="form-control" name="name" value={{$meal->name}}>
                </div>

                <div class="mt-4">
                    <label for="calories">Calories</label>
                    <input type="number" class="form-control" name="calories" value={{$meal->calories}}>
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('meal.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealRequest', '#edit-meal') !!}
@endpush
