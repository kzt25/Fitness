@extends('layouts.app')
@section('content')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="h3">Meal</h3>
            <div class="card p-4 mb-5">
                <table class="table  Datatable " style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Calories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/getmeal',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'calories',
                        name: 'calories'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },

                ]
            });
        });
    </script>
@endpush


