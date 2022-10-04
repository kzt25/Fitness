@extends('layouts.app')


@section('content')
    <h1>I am Admin Home Page</h1>
    <div class="card p-4 mb-5">
        <table class="table table-striped  Datatable " style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '/admin/datatable/ssd',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    }
                ]
            });
        });
    </script>
@endpush
