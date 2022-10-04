@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Create Meal</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
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
                    <label for="name">Meal Plan Type</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="mt-4">
                    <label for="calories">Calories</label>
                    <input type="text" class="form-control" name="calories">
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('meal.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealRequest', '#create-meal') !!}
@endpush
