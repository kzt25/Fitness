@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Password Reset') }}</div>

                <div class="card-body">

                    <form method="POST" action = "{{route('password_reset')}}" >
                        @csrf

                        <div class="row mb-3 ">

                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="[jpme]" type="phone" class="form-control phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            </div>
                        </div>
                        <div class="col-md-10 d-flex justify-content-end mb-3">
                            @if (Session::has('phone'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong style = "color:red;">{{ Session::get('phone') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style = "color:red;"></button>
                              </div>

                            @endif
                        </div>

                        {{-- <div class="row mb-3 "> --}}

                            <div class="row mb-3">
                                <div class="col-md-2 offset-md-4">
                                    <a class="btn btn-warning " id="checkPhone" >
                                        {{ __('Get OTP') }}
                                    </a>
                                </div>
                                <div class="col-md-3 ">

                                    <input type="number" class="form-control" id = "checkOTP" required >

                                </div>
                                <div class="col-md-1 align-self-center">

                                     <i class="fa-solid fa-circle-check" id="check_icon"></i>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Enter Password') }}</label>
                                    <input  type="password" name="password" class="form-control" id="password" required >
                                </div>
                                <div class="col-md-6 ">
                                    <label for="confirmPassword" class="col-md-6 col-form-label text-md-end">{{ __('Enter Confirm Password') }}</label>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword" required >
                                </div>
                            </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-8">
                                <button type="submit" class="btn btn-primary" id="otp">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
     $(document).ready(function() {
        $("#password").prop('disabled', true);
        $("#cpassword").prop('disabled', true);
        var otpStatus
       $("#checkPhone").click(function(){
          var phone = $(".phone").val();
          $.ajax({
                url : 'checkPhoneGetOTP',
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:  {"phone":phone},
                success   : function(data) {
                    otpStatus = data
                    if(data.status == 300){
                        alert(data.message);
                    }
                    if(data.status == 200){

                    }
                },
        });
    });


        $("#checkOTP").keyup(function(){
            if(otpStatus.status === 200){
                var code = $('#checkOTP').val();
                                fetch(`https://verify.smspoh.com/api/v1/verify?access-token=gND4P7JNgbd5supML5ZT5ayuRmG0gS1cr6C09apXkkpc5m2QzBEOH3Euc5jX27t0&request_id=${otpStatus.message}&code=${code}`)
                                .then(function(response) {
                                    // handle the response
                                    console.log(response.status)
                                    if(response.status === 200){
                                        $("#check_icon").css("color", "green");
                                        $("#password").prop('disabled', false);
                                        $("#cpassword").prop('disabled', false);
                                    }
                                    else{
                                        $("#check_icon").css("color", "red");
                                    }
                                })
                                .catch(function() {
                                    // handle the error
                                    alert('Something went wrong!')
                                });
            }
        });
})
</script>





