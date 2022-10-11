@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Edit Bank Account</h3>

            <form action="{{ route('bankinginfo.update',$bankinginfo->id) }}" method="POST" id="create-trainer">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Payment Type</label>
                    <input type="text" class="form-control" name="type" value="{{$bankinginfo->payment_type}}">
                </div>
                <div class="mb-3">
                    <label for="accname">Account Name</label>
                    <input type="text" class="form-control" name="accountName" value="{{$bankinginfo->account_name}}">
                </div>
                <div class="mb-3">
                    <label for="name">Account Holder</label>
                    <input type="text" class="form-control" name="accountHolder" value="{{$bankinginfo->bank_account_holder}}">
                </div>
                <div class="mb-3">
                    <label for="name">Account No.</label>
                    <input type="text" class="form-control" name="accountNo" value="{{$bankinginfo->bank_account_number}}">
                </div>
                <div class="mb-4">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="phone" value="{{$bankinginfo->phone}}">
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
