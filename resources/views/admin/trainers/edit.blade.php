@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Edit Trainer</h3>
    <div class="col-md-8 mx-auto">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card shadow p-4">
            <form action="{{ route('trainer.update', $trainer->id) }}" method="POST" id="edit-trainer">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $trainer->name) }}">
                </div>
                <div class="mt-4">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="phone" value="{{ old('name', $trainer->phone) }}">
                </div>
                <div class="mt-4">
                    <label class="" for="training_type">Training Type</label> <br>

                    <select class="form-control " name="training_type" id="training_type">
                        <option value="weight_gain">Weight Gain</option>
                        <option value="weight_loss">Weight Loss</option>
                        <option value="body_beauty">Body Beauty</option>
                    </select>


                </div>
                <div class="mt-4">
                    <label for="address">Address</label>
                    <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ $trainer->address }}</textarea>
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('trainer.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateTrainerRequest', '#edit-trainer') !!}
@endpush
