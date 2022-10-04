@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Create Meal Plan</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('mealplan.store') }}" method="POST" id="create-mealplan">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="name">Member ID</label>
                    <input type="text" class="form-control" name="name">
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
