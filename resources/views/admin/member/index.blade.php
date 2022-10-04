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
    {{-- @if (Session::has('success'))
        <script>
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
    })
        </script>
    @endif --}}
<div class="col-md-11 mx-auto">
    <div class="col-12">
        <h2 class="text-center pt-3 pb-2">All Members' Types</h2>
        <a href="{{route('member.create')}}" class="create_trainer btn btn-primary my-3 float-end"><i
                class="fa-solid fa-circle-plus me-2 fa-lg"></i>Create Member Type</a>
    </div>

    <div class="col-12 card p-4 mb-5">
        <table class="table table-striped Datatable " style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member Type</th>
                        <th>Level</th>
                        <th>Price</th>
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

        $(document).ready(function () {
            var i =1 ;
            var table = $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/member/datatable/ssd',
                columns: [
                    {
                        data: 'id',
                        render: function() {
                        return i++;
                    }
                    },
                    {
                        data: 'member_type',
                        name: 'member_type'
                    },
                    {
                        data: 'member_type_level',
                        name: 'member_type_level'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            $(document).on('click','.delete', function (e) {

                e.preventDefault();
                var id = $(this).data('id');

                swal({
                        text: "Are you sure you want to delete?",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: "GET",
                                url: `/member/${id}/delete`
                            }).done(function(res) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Deleted'
                                })
                                table.ajax.reload(null, false);
                            })
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });

            })

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
