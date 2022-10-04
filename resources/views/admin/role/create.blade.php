@extends('layouts.app')
@section('content')
    <h3 class="text-center pt-3 pb-2">Create Role</h3>
    <div class="col-md-8 mx-auto">
        <div class="card shadow p-4">
            <form action="{{ route('role.store') }}" method="POST" id="create-role">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <p>Permissions</p>

                <div class="float-end mt-4">
                    <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\CreateRoleRequest', '#create-role') !!}
@endpush
