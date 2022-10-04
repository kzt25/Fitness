@extends('layouts.app')


@section('content')
    <h1>Members</h1>

    <a href="{{route('member.create')}}" class="btn btn-primary ">
       Add New
    </a>
<br><br>
    <div class="card p-4 mb-5">
        <table class="table  Datatable " style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Member Type</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>

        $(document).ready(function () {
            var table = $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/member/datatable/ssd',
                columns: [{
                        data: 'id',
                        name: 'id'
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
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
            $(document).on('click','.delete', function (e) {
            e.preventDefault();
                var id=$(this).data('id');
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                $.ajax({
                    url: `/member/${id}/delete`,
                    type:`GET`,
                    success:function(){
                        table.ajax.reload(null, false);
                    }
                })
            })
        })
    </script>
@endpush
