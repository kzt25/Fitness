@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Create Member Type</h3>

            <form action="{{ route('member.store') }}" method="POST" id="create_member_type">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="mb-4">
                    <label for="member_type" class="form-label">Member Type</label>
                    <input type="text" class="form-control" id="member_type" name="member_type">

                </div>
                <div class="mt-4">
                    <label for="duration" class="form-label">Duration(Month)</label>
                    <input type="number" class="form-control" id="duration" name="duration">
                </div>
                <div class="mt-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                {{-- <p>Permissions</p>
                <div class="row mb-3">
                    @foreach ($permissions as $permission)
                        <div class="col-md-3 col-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                                    name="permissions[]" id="{{ $permission->name }}" />
                                <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="float-end mt-4">
                    <a href="{{ route('member.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\CreateMemberRequest', '#create_member_type') !!}
@endpush
