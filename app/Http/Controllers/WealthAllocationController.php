<?php

namespace App\Http\Controllers;

use App\Models\WealthAllocation;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WealthAllocationController extends Controller
{
    public function __construct(WealthAllocation $wealthallocation,
        Customer $customer)
    {
        $this->wealthallocation = $wealthallocation;
        $this->customer = $customer;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'lumpsum_amount' => 'required|string|max:255',
            'sip_amount' => 'required|string|max:255',
            'timeframe' => 'required|string|max:255',
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $reqData['lumpsum_amount'] = $request['lumpsum_amount'];
        $reqData['sip_amount'] = $request['sip_amount'];
        $reqData['timeframe'] = $request['timeframe'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        if($request['cust_wel_all'])
        {
            $wealthData = $this->wealthallocation->UpdatedWealthAllocation($request['cust_wel_all'],$reqData);
            $status = "Wealth Allocation Updated Successfully";
        }
        else
        {
            $wealthData = $this->wealthallocation->InsertWealthAllocation($reqData);
            $status = "Wealth Allocation Added Successfully";
        }
         return response()->json([
              'status' => $status
          ], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
         return response()->json([
              'status' => 'success',
              'wealthdata' => $wealthData
          ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
   /* public function getBankInfoWithIFSC(Request $request)
    {
        $bankData = json_decode(file_get_contents("https://ifsc.razorpay.com/INDB0000226"),true);
        return $bankData;
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
