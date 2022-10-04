@extends('layouts.app')

@section('styles')
    <style>
        .swal2-popup {
            display: none;
            position: relative;
            box-sizing: border-box;
            grid-template-columns: minmax(0, 100%);
            width: 40em !important;
            max-width: 100%;
            padding: 0 0 1.25em;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: #545454;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-label {
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-11 mx-auto">
        <div class="col-12">
            <h2 class="text-center pt-3 pb-2">Meal Plan</h2>
            <a href="{{ route('meal.create') }}" class="create_trainer btn btn-primary my-3 float-end"><i
                    class="fa-solid fa-circle-plus me-2 fa-lg"></i>Create Meal </a>
        </div>

        <div class="col-12 card p-4 mb-5">
            <table class="table table-striped Datatable " style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Calories</th>
                        <th>Meal Plan Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $(function() {
            $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
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
                        data: 'meal_plan_id',
                        name: 'meal_plan_id'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                })
            @endif
        });
    </script>
@endpush
