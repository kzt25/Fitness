@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Create Meal</h3>
            <form action="{{ route('meal.store') }}" method="POST" id="create-meal">
                @csrf

                <div class="mb-4">
                    <label class="" for="meal_plan_id">Meal Plan Type</label> <br>
                    <select class="form-control " name="meal_plan_id" id="meal_plan_id">
                        @foreach($meal_plan_type as $meal_plan)
                        <option value="{{$meal_plan->id}}">{{$meal_plan->meal_plan_type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label for="name">Meal Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="mt-4">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                </div>

                <div class="mt-4">
                    <label for="calories">Calories</label>
                    <input type="number" class="form-control" name="calories">
                </div>



                <div class="float-end mt-4">
                    <a href="{{ route('meal.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" onclick="submitForm(this);">Confirm</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealRequest', '#create-meal') !!}
@endpush
