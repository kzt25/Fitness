@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Create Meal Plan</h3>
            <form action="{{ route('mealplan.store') }}" method="POST" id="create-mealplan">
                @csrf
                <div class="mt-4">
                    <label for="name">Meal Plan Type</label>
                    <input type="text" class="form-control" name="meal_plan_type">
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
                <div class="float-end mt-4">
                    <button type="submit" class="btn btn-primary" onclick="submitForm(this);">Confirm</button>
                    <a href="{{ route('mealplan.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    {{-- <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }
    </script> --}}
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealPlanRequest', '#create-mealplan') !!}
@endpush
