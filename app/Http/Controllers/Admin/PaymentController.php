<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class PaymentController extends Controller
{
    public function detail($id){

        $payment = Payment::where('user_id',$id)->with('user')->first();
        //dd($payment->toArray());
        return view('admin.request.paymentdetail', compact('payment'));

    }

    public function transctionView(){
        return view('admin.payment.paymentTransction');
    }

    public function bankPaymentTransction()
    {
        $banktransction = Payment::where('payment_type','bank')->with('user')->whereHas('user', function($query){
            $query->where('active_status',1);
        });
        //dd($banktransction->toArray());
        return Datatables::of($banktransction)
            ->addIndexColumn()
            ->addColumn('action', function ($each) {

                $detail_icon = '';

                $detail_icon = '<a href=" ' . route('transactionbank.detail', $each->user->id) . ' " class="text-warning mx-1 mt-1" title="payment">
                                    <i class="fa-solid fa-circle-info fa-xl"></i>
                              </a>';

                return '<div class="d-flex justify-content-center">' .$detail_icon. '</div>';
            })
            ->make(true);
    }

    public function transactionBankDetail($id){

        $banktransctiondetail = Payment::where('payment_type','bank')->where('user_id',$id)->with('user')->first();
        return view('admin.payment.transactionBankDetail', compact('banktransctiondetail'));
    }

    public function EPaymentTransction()
    {
        $wallettransction = Payment::where('payment_type','ewallet')->with('user')->whereHas('user', function($query){
            $query->where('active_status',1);
        });
        return Datatables::of($wallettransction)
            ->addIndexColumn()
            ->addColumn('action', function ($each) {

                $detail_icon = '';

                $detail_icon = '<a href=" ' . route('transactionwallet.detail', $each->user->id) . ' " class="text-warning mx-1 mt-1" title="payment">
                                    <i class="fa-solid fa-circle-info fa-xl"></i>
                              </a>';

                return '<div class="d-flex justify-content-center">' .$detail_icon. '</div>';
            })
            ->make(true);
    }

    public function transactionWalletDetail($id){
        $banktransctiondetail = Payment::where('payment_type','ewallet')->where('user_id',$id)->with('user')->first();
        return view('admin.payment.transactionWalletDetail', compact('banktransctiondetail'));
    }
}
