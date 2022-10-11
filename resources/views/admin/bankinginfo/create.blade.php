@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Add New Bank Account</h3>

            <form action="{{ route('bankinginfo.store') }}" method="POST" id="create-trainer">
                @csrf
                <div class="mb-3">
                    <label for="name">Payment Type</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div class="mb-3">
                    <label for="accname">Account Name</label>
                    <input type="text" class="form-control" name="accountName">
                </div>
                <div class="mb-3">
                    <label for="name">Account No.</label>
                    <input type="text" class="form-control" name="accountNo">
                </div>
                <div class="mb-3">
                    <label for="name">Account Holder</label>
                    <input type="text" class="form-control" name="accountHolder">
                </div>
                <div class="mb-4">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="phone">
                </div>
                <div class="float-end mt-4">
                    <a href="{{ route('bankinginfo.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>

            </form>
        </div>
    </div>
@endsection


{{-- @push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\CreateTrainerRequest', '#create-trainer') !!}
@endpush --}}
