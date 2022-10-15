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
        tbody{
            text-transform: capitalize;
        }
        .exportBtn{
            border-radius: 100px;
        }
    </style>
@endsection

@section('transction-active', 'active')
@section('content')
    <div class="col-md-11 mx-auto">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-center mb-0">Bank Payment Transaction</h2>
        </div>

        <div class="col-12 card p-4 mb-5">
            <table class="table table-striped Datatable" id="bank" style="width: 100%">
                <thead>
                    <tr class="align-middle">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Payment Type</th>
                        <th>Bank Name</th>
                        <th>Bank Account</th>
                        <th>Account Holder</th>
                        <th>Amount</th>
                        <th>View Detail</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

    <div class="col-md-11 mx-auto">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-center mb-0">E-wallet Payment Transaction</h2>
        </div>

        <div class="col-12 card p-4 mb-5">
            <table class="table table-striped Datatablewallet" id="wallet" style="width: 100%">
                <thead>
                    <tr class="align-middle">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Payment Type</th>
                        <th>Payment Name</th>
                        <th>Account Name</th>
                        <th>Phone No.</th>
                        <th>Amount</th>
                        <th>View Detail</th>
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
            var table = $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: 'payment/bank/transction',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'payment_type',
                        name: 'payment_type'
                    },
                    {
                        data: 'payment_name',
                        name: 'payment_name'
                    },
                    {
                        data: 'bank_account_number',
                        name: 'bank_account_number'
                    },
                    {
                        data: 'bank_account_holder',
                        name: 'bank_account_holder'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                dom:'lBfrtip',
                buttons: [
                    { extend: 'pdfHtml5',text:'Export PDF', className:"bg-primary text-white rounded p-1 mt-1", title:'Bank payment transaction', exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }},
                    { extend: 'excelHtml5', text: ' Export Excel', className: "bg-primary text-white rounded p-1 mt-1", title:'Bank payment transaction', exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]}},
                ],


            });


            var i = 1;
            var wallettable = $('.Datatablewallet').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: 'payment/ewallet/transction',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'payment_type',
                        name: 'payment_type'
                    },
                    {
                        data: 'payment_name',
                        name: 'payment_name'
                    },
                    {
                        data: 'account_name',
                        name: 'account_name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                dom:'lBfrtip',
                buttons: [
                    { extend: 'pdfHtml5',text:'Export PDF', className:"bg-primary text-white rounded p-1 mt-1", title:'E-wallet payment transaction', exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]}},
                    { extend: 'excelHtml5', text: ' Export Excel', className: "bg-primary text-white rounded p-1 mt-1", title:'E-wallet payment transaction', exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]}}
                ],

            });
        });

    </script>
@endpush
