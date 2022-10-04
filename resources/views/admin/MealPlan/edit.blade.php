@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Edit Meal Plan</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('mealplan.update', $mealplan->id) }}" method="POST" id="create-mealplan">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="" for="member_id">Members Type</label> <br>

                    <select class="form-control " name="member_id" id="member_id">
                        <option value="{{$mealplan->member_id}}">{{$mealplan->member_id}}</option>
                        @foreach($member as $memb)
                        <option value="{{$memb->id}}">{{$memb->member_type}}</option>
                        @endforeach
                    </select>


                </div>
                <div class="mt-4">
                    <label for="meal_plan_type">Meal Plan Type</label>
                    <input type="text" class="form-control" name="meal_plan_type" value = "{{$mealplan->meal_plan_type}}">
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('mealplan.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealPlanRequest', '#create-mealplan') !!}
@endpush
