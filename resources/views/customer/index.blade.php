@extends('customer.layouts.app')

@section('content')
@include('sweetalert::alert')


<h1>Something is comming soon.......</h1>
 @hasanyrole('Platinum')
<h1>Welcome Platinum User -  {{Auth()->user()->name}}</h1>
@endhasanyrole

@hasanyrole('Gold')
<h1>Welcome Gold User -  {{Auth()->user()->name}}</h1>
@endhasanyrole

@hasanyrole('Diamond')
<h1>Welcome Diamond User -  {{Auth()->user()->name}}</h1>
@endhasanyrole

@hasanyrole('Ruby')
<h1>Welcome Ruby User -  {{Auth()->user()->name}}</h1>
@endhasanyrole

@hasanyrole('Ruby Premium')
<h1>Welcome Rubmy Premium User -  {{Auth()->user()->name}}</h1>
@endhasanyrole

@hasanyrole('Trainer')
<h1>Welcome Trainer -  {{Auth()->user()->name}}</h1>
@endhasanyrole
@endsection
@push('scripts')
@endpush

