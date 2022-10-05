@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Create Meal Plan</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('mealplan.store') }}" method="POST" id="create-mealplan">
                @csrf
                <div class="mb-4">
                    <label class="" for="member_id">Members Type</label> <br>

                    <select class="form-control " name="member_id" id="member_id">
                        @foreach($member as $memb)
                        <option value="{{$memb->id}}">{{$memb->member_type}} - {{$memb->member_type_level}}</option>
                        @endforeach
                    </select>


                </div>
                <div class="mt-4">
                    <label for="name">Meal Plan Type</label>
                    <input type="text" class="form-control" name="meal_plan_type">
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('mealplan.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" onclick="submitForm(this);">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }
    </script>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\MealPlanRequest', '#create-mealplan') !!}
@endpush
