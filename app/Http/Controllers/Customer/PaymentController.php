<?php

namespace App\Http\Controllers\Customer;

use App\Models\BankingInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    //

    public function payment()
    {
        $banking_info = BankingInfo::all();
        return view('customer.payment',compact('banking_info'));
    }
    public function kbz_pay_store()
    {
        $payment_type = "Ewallet ";

        $user = Auth()->user()->id;
        $user = Auth()->user()->id;
    }
}
