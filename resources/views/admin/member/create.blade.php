@extends('layouts.app')
@section('content')
<h3 class="text-center pt-3 pb-2">Create Member Type</h3>
<div class="col-md-8 mx-auto">
    <div class="card shadow p-4">
    <form action="{{route('member.store')}}" method="POST" id="create_member_type">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="mb-4">
        <label for="member_type" class="form-label">Member Type</label>
        <input type="text" class="form-control" id="member_type" name="member_type">

        </div>
        <div class="mt-4">
        <label for="member_type_level" class="form-label">Level</label>
        <input type="text" class="form-control" id="member_type_level" name="member_type_level">
        </div>
        <div class="mt-4">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mt-5">
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
    </div>
</div>
@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\CreateMemberRequest', '#create_member_type') !!}
@endpush
