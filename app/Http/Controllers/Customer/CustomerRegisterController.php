<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRegisterController extends Controller
{
    //
    public function CustomerData(Request $request){
        // return response()->json([
        //            'success' => 'success',
        //             'data' => $request->allData,
        //     ]);
        $all_info = $request->allData; // json string
        $all_info =  json_decode(json_encode($all_info));
        $bodyMeasurements = $all_info->bodyMeasurements;
        $bodyMeasurements =  json_decode(json_encode($bodyMeasurements));
        dd($all_info->bodyMeasurements->height);
        dd($all_info->personalInfo[0]);
        
    }
}
