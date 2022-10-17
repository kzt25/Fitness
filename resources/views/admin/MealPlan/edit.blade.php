@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Edit Meal Plan</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('mealplan.update', $mealplan->id) }}" method="POST" id="create-mealplan">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <label for="meal_plan_type">Meal Plan Type</label>
                    <input type="text" class="form-control" name="meal_plan_type" value = "{{$mealplan->meal_plan_type}}">
                </div>


                <div class="mt-4">
                    @if($mealplan->gender == 'Male')
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

                <div class="float-end mt-4">
                    <button type="submit" class="btn btn-primary" >Update</button>
                    <a href="{{ route('mealplan.index') }}" class="btn btn-secondary">Cancel</a>

                </div>
            </form>
        </div>
    </div>

@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealPlanRequest', '#create-mealplan') !!}
@endpush
