<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankingInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class BankinginfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bankinginfo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bankinginfo.create');
    }

    public function ssd()
    {
        $bankinginfo = BankingInfo::query();
        return Datatables::of($bankinginfo)
            ->addIndexColumn()
            // ->editColumn('created_at', function ($each) {
            //     return Carbon::parse($each->created_at)->format("Y-m-d H:i:s");
            // })
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $detail_icon = '';
                $delete_icon = '';
                $edit_icon = '<a href=" ' . route('bankinginfo.edit', $each->id) . ' " class="text-warning mx-1 " title="edit">
                                    <i class="fa-solid fa-edit fa-xl"></i>
                              </a>';
                $detail_icon = '<a href=" ' . route('bankinginfo.show', $each->id) . ' " class="text-info mx-1" title="detail">
                                    <i class="fa-solid fa-circle-info fa-xl"></i>
                                </a>';

                $delete_icon = '<a href=" ' . route('bankinginfo.destroy', $each->id) . ' " class="text-danger mx-1              delete-btn" title="delete"  data-id="' . $each->id . '" >
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </a>';

                return '<div class="d-flex justify-content-center">' .  $detail_icon  . $edit_icon . $delete_icon . '</div>';
            })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bankinginfo = new BankingInfo();
        $bankinginfo->payment_type = $request->type;
        $bankinginfo->bank_account_number = $request->accountNo;
        $bankinginfo->bank_account_holder = $request->accountHolder;
        $bankinginfo->account_name = $request->accountName;
        $bankinginfo->phone = $request->phone;
        $bankinginfo->save();
        return redirect()->route('bankinginfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankinginfo = BankingInfo::findorFail($id);
        return view('admin.bankinginfo.edit', compact('bankinginfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bank = BankingInfo::findorFail($id);
        $bank->payment_type = $request->type;
        $bank->bank_account_number = $request->accountNo;
        $bank->account_name = $request->name;
        $bank->bank_account_holder = $request->accountHolder;
        $bank->phone = $request->phone;
        $bank->update();

        return redirect()->route('bankinginfo.index')->with('success', 'Payment information is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = BankingInfo::findOrFail($id);
        $bank->delete();
        return 'success';
    }
}
