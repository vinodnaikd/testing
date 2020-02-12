<?php

namespace App\Http\Controllers;

use App\Models\WealthAllocation;
use App\Models\RiskQuestions;
use App\Models\GoalsAllocation;
use App\Models\FundPerformance;
use App\Models\Customer;
use App\Models\FundClass;
use App\Models\DashboardRecordsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WealthAllocationController extends Controller
{
    public function __construct(WealthAllocation $wealthallocation,
        Customer $customer,RiskQuestions $riskquestions,GoalsAllocation $goalsallocation,FundClass $fundclass,DashboardRecordsInfo $dashboardrecordsinfo,FundPerformance $fundperformance)
    {
        $this->wealthallocation = $wealthallocation;
        $this->customer = $customer;
        $this->riskquestions = $riskquestions;
        $this->goalsallocation = $goalsallocation;
        $this->fundclass = $fundclass;
        $this->dashboardrecordsinfo = $dashboardrecordsinfo;
        $this->fundperformance = $fundperformance;

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

      if($wealthData)
      $wealthAllocateData = $this->fundperformance->getCustomerWealthAllocateNew($wealthData[0]['cust_wel_all']);
    // dd($wealthAllocateData[0]['totalcurrentvalue']);
      if($wealthAllocateData)
      {
        $wealthData[0]['totalcurrentvalue'] = $wealthAllocateData[0]['totalcurrentvalue'];
          $wealthData[0]['investmentvalue'] = $wealthAllocateData[0]['investmentvalue'];
      }
      else
      {
        $wealthData[0]['totalcurrentvalue'] = array();
        $wealthData[0]['investmentvalue'] = array();
      }
      // $newWealth = array_merge($wealthData,$goaldetails);
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
        $wealthAssets = $this->goalsallocation->getWealthAssestsByRiskScore($customerRiskProfileScore,$start,$end,'Wealth');
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
        $wealthAssets = $this->goalsallocation->getWealthAssestsByRiskScore($customerRiskProfileScore,$start,$end,'Wealth');
        
        $lumsipArray['Lumpsum_Amount'] = $wealthData[0]['lumpsum_amount'];
        $lumsipArray['Sip_Amount'] = $wealthData[0]['sip_amount'];
        $wealthAssetsData = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);

        $customerGoalsDetails = $this->wealthallocation->getWealthAllocationById($request['wealth_id']);

        if(!$wealthAssetsData)
        {
        $wealthLumSumm = array();
        $wealthSipSumm = array();
        if($wealthAssets['largecap'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'largecap';
           $wealthlum['asset_value'] = (($wealthAssets['largecap'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['largecap'];
           $wealthlum['lum_sip_type'] = "";

           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'largecap';
           $wealthsip['asset_value'] = (($wealthAssets['largecap'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['largecap'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);

        }
        if($wealthAssets['midcap'] != '0')
        {
             $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'midcap';
           $wealthlum['asset_value'] = (($wealthAssets['midcap'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['midcap'];
           $wealthlum['lum_sip_type'] = "";

           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'midcap';
           $wealthsip['asset_value'] = (($wealthAssets['midcap'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['midcap'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);
        }
        if($wealthAssets['smallcap'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'smallcap';
           $wealthlum['asset_value'] = (($wealthAssets['smallcap'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['smallcap'];
           $wealthlum['lum_sip_type'] = "";
          
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'smallcap';
           $wealthsip['asset_value'] = (($wealthAssets['smallcap'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['smallcap'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);
        }
        if($wealthAssets['longterm'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'longterm';
           $wealthlum['asset_value'] = (($wealthAssets['longterm'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['longterm'];
           $wealthlum['lum_sip_type'] = "";
           
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'longterm';
           $wealthsip['asset_value'] = (($wealthAssets['longterm'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['longterm'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);
        }
        if($wealthAssets['midterm'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'midterm';
           $wealthlum['asset_value'] = (($wealthAssets['midterm'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['midterm'];
           $wealthlum['lum_sip_type'] = "";
           
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'midterm';
           $wealthsip['asset_value'] = (($wealthAssets['midterm'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['midterm'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);
        }


        if($wealthAssets['liquid'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'liquid';
           $wealthlum['asset_value'] = (($wealthAssets['liquid'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['liquid'];
           $wealthlum['lum_sip_type'] = "";
           
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'liquid';
           $wealthsip['asset_value'] = (($wealthAssets['liquid'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['liquid'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);
        }
        if($wealthAssets['gold'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'gold';
           $wealthlum['asset_value'] = (($wealthAssets['gold'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['gold'];
           $wealthlum['lum_sip_type'] = "";
           
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'gold';
           $wealthsip['asset_value'] = (($wealthAssets['gold'] * $sip_amount)/100);
           $wealthsip['asset_percentage'] = $wealthAssets['gold'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);

        }

        foreach($wealthLumSumm as $key =>$value)
        {
            $reqdata['customerid'] = $getCustomerInfo['customerid'];
            $reqdata['goalid'] = $wealthData[0]['cust_wel_all'];
            $reqdata['asset'] = $value['assettype'];
            $reqdata['asset_value'] = $value['asset_value'];
            $reqdata['asset_percentage'] = $value['asset_percentage'];
            $reqdata['lumpsum_sip'] = $wealthData[0]['lumpsum_amount'];
            $reqdata['purchase_type'] = "L";
            $reqdata['duration'] = $wealthData[0]['timeframe'];
            $data = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqdata);
        }
        foreach($wealthSipSumm as $key =>$value)
        {
            $reqdata['customerid'] = $getCustomerInfo['customerid'];
            $reqdata['goalid'] = $wealthData[0]['cust_wel_all'];
            $reqdata['asset'] = $value['assettype'];
            $reqdata['asset_value'] = $value['asset_value'];
            $reqdata['asset_percentage'] = $value['asset_percentage'];
            $reqdata['lumpsum_sip'] = $wealthData[0]['sip_amount'];
            $reqdata['purchase_type'] = "S";
            $reqdata['duration'] = $wealthData[0]['timeframe'];
            $data = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqdata);
        }
    }

    $customerGoalsDetails = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);
  $goalsLumSumm = array();
       $goalsSipSumm = array();
       foreach ($customerGoalsDetails as $key => $value) {
        if($value['purchase_type'] == "L")
        {
           $goals['lumpsum_amount'] = $value['lumpsum_sip'];
           $goalsdet1['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet1['assettype'] = $value['asset'];
           $goalsdet1['asset_value'] = $value['asset_value'];
           $goalsdet1['asset_percentage'] = $value['asset_percentage'];
           $goalsdet1['lum_sip_type'] = $value['lum_sip_type'];
           $goalsdet1['duration'] = $value['duration'];
           array_push($goalsLumSumm, $goalsdet1);
        }
        else
        {
           $goals['sip_amount'] = $value['lumpsum_sip'];
           $goalsdet['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet['assettype'] = $value['asset'];
           $goalsdet['asset_value'] = $value['asset_value'];
           $goalsdet['asset_percentage'] = $value['asset_percentage'];
           $goalsdet['lum_sip_type'] = $value['lum_sip_type'];
           $goalsdet['duration'] = $value['duration'];
           array_push($goalsSipSumm, $goalsdet);
        }
           
       }

        $goaldetails['Lumpsum'] = $goalsLumSumm;
       $goaldetails['Sip_Amount'] = $goals['sip_amount'];
       $goaldetails['Lumpsum_Amount'] = $goals['lumpsum_amount'];
       $goaldetails['Sip'] = $goalsSipSumm;

       if($goalsLumSumm[0]['lum_sip_type'] == "" && $goalsSipSumm[0]['lum_sip_type'] == "")
       {
            $goaldetails['lumpsum_check'] = "true";
            $goaldetails['sip_check'] = "true";
       }
       else
       {
            if($goalsLumSumm[0]['lum_sip_type'] == "checked")
           $goaldetails['lumpsum_check'] = "true";
           else
           $goaldetails['lumpsum_check'] = "false";
            if($goalsSipSumm[0]['lum_sip_type'] == "checked")
           $goaldetails['sip_check'] = "true";
           else
           $goaldetails['sip_check'] = "false";
       }

        /*$lumsipArray['Lumpsum'] = $wealthLumSumm;
        $lumsipArray['Sip'] = $wealthSipSumm;*/
         return response()->json([
              'status' => 'success',
              'wealthAssets' => $goaldetails
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
