<?php

namespace App\Http\Controllers;

use App\Models\WealthAllocation;
use App\Models\RiskQuestions;
use App\Models\GoalsAllocation;
use App\Models\Customer;
use App\Models\FundClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WealthAllocationController extends Controller
{
    public function __construct(WealthAllocation $wealthallocation,
        Customer $customer,RiskQuestions $riskquestions,GoalsAllocation $goalsallocation,FundClass $fundclass)
    {
        $this->wealthallocation = $wealthallocation;
        $this->customer = $customer;
        $this->riskquestions = $riskquestions;
        $this->goalsallocation = $goalsallocation;
        $this->fundclass = $fundclass;

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

     public function getWealthAssestType(Request $request)
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
         $customerRiskProfileScore = round($this->riskquestions->getCustomerRiskProfileScore($getCustomerInfo['customerid']));
         $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
         $start = $wealthData[0]['timeframe'];
         $end = $wealthData[0]['timeframe'];
        $wealthAssets = $this->goalsallocation->getWealthAssestsByRiskScore($customerRiskProfileScore,$start,$end);
        if($wealthAssets['largecap'] != '0')
            $assetsArr['largecap'] = $wealthAssets['largecap'];
        if($wealthAssets['midcap'] != '0')
            $assetsArr['midcap'] = $wealthAssets['midcap'];
        if($wealthAssets['smallcap'] != '0')
            $assetsArr['smallcap'] = $wealthAssets['smallcap'];
        if($wealthAssets['longterm'] != '0')
            $assetsArr['longterm'] = $wealthAssets['longterm'];
        if($wealthAssets['midterm'] != '0')
            $assetsArr['midterm'] = $wealthAssets['midterm'];
        if($wealthAssets['liquid'] != '0')
            $assetsArr['liquid'] = $wealthAssets['liquid'];
        if($wealthAssets['gold'] != '0')
            $assetsArr['gold'] = $wealthAssets['gold'];
         return response()->json([
              'status' => 'success',
              'wealthAssets' => $assetsArr
          ], 200);
    }

public function getCustomerWealthAllocation(Request $request)
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
         $customerRiskProfileScore = round($this->riskquestions->getCustomerRiskProfileScore($getCustomerInfo['customerid']));
         $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
         $start = $wealthData[0]['timeframe'];
         $end = $wealthData[0]['timeframe'];
          $lumpsum_amount = $wealthData[0]['lumpsum_amount'];
         $sip_amount = $wealthData[0]['sip_amount'];
        $wealthAssets = $this->goalsallocation->getWealthAssestsByRiskScore($customerRiskProfileScore,$start,$end);

        if($wealthAssets['largecap'] != '0')
        {
            $lumpsumArr['largecap'] = (($wealthAssets['largecap'] * $lumpsum_amount)/100);
            $sipArr['largecap'] = (($wealthAssets['largecap'] * $sip_amount)/100);
            $assetsArr['largecap'] = $wealthAssets['largecap'];
        }
        if($wealthAssets['midcap'] != '0')
        {
            $lumpsumArr['midcap'] = (($wealthAssets['midcap'] * $lumpsum_amount)/100);

        $sipArr['midcap'] = (($wealthAssets['midcap'] * $sip_amount)/100);
            $assetsArr['midcap'] = $wealthAssets['midcap'];
        }
        if($wealthAssets['smallcap'] != '0')
        {
            $lumpsumArr['smallcap'] = (($wealthAssets['smallcap'] * $lumpsum_amount)/100);
            $sipArr['smallcap'] = (($wealthAssets['smallcap'] * $sip_amount)/100);
            $assetsArr['smallcap'] = $wealthAssets['smallcap'];
        }


        if($wealthAssets['longterm'] != '0')
        {
            $lumpsumArr1['longterm'] = (($wealthAssets['longterm'] * $lumpsum_amount)/100);
        $sipArr1['longterm'] = (($wealthAssets['longterm'] * $sip_amount)/100);
            $assetsArr1['longterm'] = $wealthAssets['longterm'];
        }
        if($wealthAssets['midterm'] != '0')
        {
            $lumpsumArr1['midterm'] = (($wealthAssets['midterm'] * $lumpsum_amount)/100);
            $sipArr1['midterm'] = (($wealthAssets['midterm'] * $sip_amount)/100);
            $assetsArr1['midterm'] = $wealthAssets['midterm'];
        }


        if($wealthAssets['liquid'] != '0')
        {
            $lumpsumArr1['liquid'] = (($wealthAssets['liquid'] * $lumpsum_amount)/100);
            $sipArr1['liquid'] = (($wealthAssets['liquid'] * $sip_amount)/100);
            $assetsArr3['liquid'] = $wealthAssets['liquid'];
        }


        if($wealthAssets['gold'] != '0')
        {
            $lumpsumArr1['gold'] = (($wealthAssets['gold'] * $lumpsum_amount)/100);
            $sipArr1['gold'] = (($wealthAssets['gold'] * $sip_amount)/100);
            $assetsArr2['gold'] = $wealthAssets['gold'];
        }
        if(!empty($assetsArr))
        {
            // dd(array_sum($assetsArr));
        $assettypeArr['Equity_percentage'] = array_sum($assetsArr);
        
        $assetsArr['lumpsum'] = $lumpsumArr;
        $assetsArr['sip'] = $sipArr;
        $assettypeArr['Equity'] = $assetsArr;
        }
        if(!empty($assetsArr1))
        {
        $assettypeArr['Debt_percentage'] = array_sum($assetsArr1);
        $assetsArr1['lumpsum'] = $lumpsumArr1;
        $assetsArr1['sip'] = $sipArr1;
            $assettypeArr['Debt'] = $assetsArr1;
        }
        if(!empty($assetsArr2))
        {
            $assettypeArr['Gold_percentage'] = array_sum($assetsArr2);
            $assettypeArr['Gold'] = $assetsArr2;
        }
        if(!empty($assetsArr3))
        {
            $assettypeArr['Liquid_percentage'] = array_sum($assetsArr3);
            $assettypeArr['Liquid'] = $assetsArr3;
        }
         return response()->json([
              'status' => 'success',
              'wealthAssets' => $assettypeArr
          ], 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
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
