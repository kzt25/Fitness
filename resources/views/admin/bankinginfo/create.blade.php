@extends('layouts.app')
@section('bankinginfo-active','active')

@section('content')
    <div class="col-md-8 mx-auto">
        <a href="javascript:history.back()" class="btn btn-primary mb-2"><i class="fa-solid fa-arrow-left-long"></i> &nbsp; Back</a>

        <div class="card shadow p-4">
            <h3 class="text-center mb-2">Add New Bank Account</h3>

            <form action="{{ route('bankinginfo.store') }}" method="POST" id="create-trainer">
                @csrf
                <div class="d-flex mb-3">
                    <label>Payment Type :</label>
                    <div class="form-check ms-3">
                        <label class="form-check-label" >
                          Bank Transfer
                          <input class="form-check-input" type="radio" name="paymentType" id="bank" value="bank transfer">
                        </label>
                    </div>
                     <div class="form-check ms-3">
                        <label class="form-check-label">
                          E-wallet
                          <input class="form-check-input" type="radio" name="paymentType" id="ewallet" value="ewallet">
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="accname">Payment Name</label>
                    <input type="text" class="form-control" name="paymentName">
                </div>

                <div class="mb-3" id="bank-number">
                    <label for="name">Bank Account No.</label>
                    <input type="text" class="form-control" name="accountNo">
                </div>
                <div class="mb-3" id="bank-holder">
                    <label for="name">Bank Account Holder</label>
                    <input type="text" class="form-control" name="accountHolder">
                </div>

                <div class="mb-3" id="accname" style="display: none;">
                    <label>Account Name </label>
                    <input type="text" class="form-control" name="accountName">
                </div>

                <div class="mb-4" id="phone" style="display: none;">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="phone">
                </div>

                <div class="float-end mt-4">
                    <a href="{{ route('bankinginfo.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>

            </form>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    $("#ewallet").click(function() {
        $('#accname').show();
        $('#phone').show();
        $('#bank-number').hide();
        $('#bank-holder').hide();
    });

    $("#bank").click(function() {
        $('#bank-number').show();
        $('#bank-holder').show();
        $('#accname').hide();
        $('#phone').hide();
    });

</script>

@endpush
