@extends('layouts.app')
@section('content')

    <form action="{{route('member.store')}}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="mb-3">
        <label for="member_type" class="form-label">Member Type</label>
        <input type="text" class="form-control" id="member_type" name="member_type">

        </div>
        <div class="mb-3">
        <label for="member_type_level" class="form-label">Level</label>
        <input type="text" class="form-control" id="member_type_level" name="member_type_level">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary">Cancel</button>
    </form>
@endsection
