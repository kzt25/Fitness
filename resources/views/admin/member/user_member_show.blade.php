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
@section('member-active', 'active')
@section('content')
    {{-- @if (Session::has('success'))
        <script>
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
    })
        </script>
    @endif --}}
    <div class="col-md-11 mx-auto">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-center mb-0">All Member</h2>
        </div>

        <div class="col-12 card p-4 mb-5">
            <table class="table table-striped datatable " style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone </th>
                        <th>Member type</th>
                        <th>Level</th>
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
        $(document).ready(function() {
            var i = 1;

            var table = $('.datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: 'admin/user_member/datatable/ssd',
                columns: [
                    {data: 'DT_RowIndex',
                     name: 'DT_RowIndex',
                     orderable: false,
                     searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'member_type',
                        name: 'member_type'
                    },
                    {
                        data: 'membertype_level',
                        name: 'membertype_level'
                    },
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
        })
    </script>
@endpush