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
                        @foreach($meal_plan_type as $meal_plan)
                        <option value="{{$meal_plan->id}}" {{ $meal_plan->id == $meal->meal_plan_id ? "selected":"" }}>{{$meal_plan->meal_plan_type}}</option>
                        @endforeach
                    </select>
                </div>
 
                <div class="mt-4">
                    <label for="name">Meal Name</label>
                    <input type="text" class="form-control" name="name" value="{{$meal->name}}">
                </div>


                <div class="mt-4">
                    @if($meal->gender == 'Male')
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      @else
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" checked>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      @endif
                </div>

                <div class="mt-4">
                    <label for="calories">Calories</label>
                    <input type="number" class="form-control" name="calories" value={{$meal->calories}}>
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('meal.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" >Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealRequest', '#edit-meal') !!}
@endpush
