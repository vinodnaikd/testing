<?php

namespace App\Http\Controllers;
use App\Models\RiskQuestions;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\FundPerformance;
use App\Models\FundClass;
use App\Models\DashboardRecordsInfo;
use App\Models\FundRecord;
use App\Models\FundProducts;
use App\Models\Fundroi;
use App\Models\WealthAllocation;
use App\Models\SurplusCalculation;
use App\Models\GoalsAllocation;
use App\Models\AssetRebalancing;

class GoalController extends Controller
{
    public function __construct(
        Goal $goals,
        Customer $customer,
        RiskQuestions $riskprofile,
        FundPerformance $fundperformance,
        FundClass $fundclass,
        DashboardRecordsInfo $dashboardrecordsinfo,
        FundRecord $fundrecord,
        FundProducts $fundproducts,
        Fundroi $fundroi,
        WealthAllocation $wealthallocation,
        SurplusCalculation $surpluscalculation,
        GoalsAllocation $goalsallocation,
        AssetRebalancing $assetrebalancing
    )
    {
        $this->goals = $goals;
        $this->customer = $customer;
        $this->riskprofile = $riskprofile;
        $this->fundperformance = $fundperformance;
        $this->fundclass = $fundclass;
        $this->dashboardrecordsinfo = $dashboardrecordsinfo;
        $this->fundrecord = $fundrecord;
        $this->fundproducts = $fundproducts;
        $this->fundroi = $fundroi;
        $this->wealthallocation = $wealthallocation;
        $this->surpluscalculation = $surpluscalculation;
        $this->goalsallocation = $goalsallocation;
        $this->assetrebalancing = $assetrebalancing;
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
       // dd($request->json()->all());
        if(empty($request['customergoalid']))
        {
        $validator = Validator::make($request->json()->all(), [
            'goal_name' => 'required|string|max:255',
            'cost_goal' => 'required|string|max:255',
            'time_frame' => 'required|string|max:255',
            'userid' => 'required|string|max:255',
            'future_cost' => 'required|string|max:255',
            //'goalpriority' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
    }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['goalname'] = $request['goal_name'];
        $reqData['goalcost'] = $request['cost_goal'];
        $reqData['timeframe'] = $request['time_frame'];
        $reqData['futurecost'] = $request['future_cost'];
        $reqData['goalpriority'] = $request['goalpriority'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        if($request['priority'] == "priority")
        {
          $goalListData = $this->goals->getGoals($request['customergoalid']);
           $goalId = $this->goals->getGoalIdBasedOnPriority($request['goalpriority'],$getCustomerInfo['customerid']);
                // dd($goalId);
                //dd($goalId['goalpriority'].''.$goalListData[0]['goalpriority']);
                $reqData1['goalpriority'] = $reqData['goalpriority'];
                // dd($reqData1['goalpriority']);
                 $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData1);
                  if($goalData)
                  {
                     $reqData2['goalpriority'] = $goalListData[0]['goalpriority'];
                    $goalData = $this->goals->UpdateCustomerGoals($goalId['customergoalid'],$reqData2);
                    $goalId = $request['customergoalid'];
                    $status = "Goal Updated Successfully";
                  }
                  $goalId = $request['customergoalid'];
                    $status = "Goal Updated Successfully";
                  // $status = "Goal Updated Successfully";
        }
        else
        {
        if($request['customergoalid'])
        {
            $goalListData = $this->goals->getGoals($request['customergoalid']);
            // dd($goalListData);
            if($goalListData[0]['goalpriority'] == $request['goalpriority'])
            {

                $reqData1['goalpriority'] = $reqData['goalpriority'];
                 $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData1);
                 if($goalData == 0)
                 {
                  $reqData1['goalpriority'] = $reqData['goalpriority'];
                 $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData);
                 }
                 $goalId = $request['customergoalid'];
                 $status = "Goal Updated Successfully";
                /* $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData1);*/
            }
            else
            {
                 //echo "sasad";
                $goalId = $this->goals->getGoalIdBasedOnPriority($request['goalpriority'],$getCustomerInfo['customerid']);
                // dd($goalId);
                //dd($goalId['goalpriority'].''.$goalListData[0]['goalpriority']);
                $reqData1['goalpriority'] = $reqData['goalpriority'];
                 $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData1);
                  if($goalData)
                  {
                     $reqData2['goalpriority'] = $goalListData[0]['goalpriority'];
                    $goalData = $this->goals->UpdateCustomerGoals($goalId['customergoalid'],$reqData2);
                  }
            }
           
            $goalId = $request['customergoalid'];
            $status = "Goal Updated Successfully";
        }
        else
        {
            $priorityData = $this->goals->getGoalsPriorityLastRecord($getCustomerInfo['customerid']);
           // dd($priorityData);
            if(!empty($priorityData[0]))
            {
                $reqData['goalpriority'] = $priorityData[0]['goalpriority']+1;
            }
            else
            {
                $reqData['goalpriority'] = 1;
            }
             $reqData['customergoalid'] = "GL456-SSD5-DDDD-FDGJ-DDSF-".rand()."KJSDF35675".rand();
            $goalData = $this->goals->InsertCustomerGoals($reqData);
             $goalId = $reqData['customergoalid'];
             $status = "Goal Added Successfully";
        }
      }
      if($goalId)
        {
            $goalListData = $this->goals->getGoals($goalId);
            return response()->json([
              'status' => $status,
              'goal_info' => $goalListData
          ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        dd(111);
        $data = (object)Array(
        "goal_name" => "marriage proposal",
       "cost_goal" => "100000",
       "time_frame" => "21/07/2019",
       "future_cost" => "50000",
       "goal_id" => "i");
	   
	   return response()->json([
            $data
            
        ], 200);
    }
 public function getGoalsList(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $Goalsdata = $this->goals->getGoalsList($getCustomerInfo['customerid']);
        $surplusData = $this->surpluscalculation->getCustomerSurplusCalculationDetails($getCustomerInfo['customerid']);
        $customerGoals = $this->fundperformance->getCustomerGoals($getCustomerInfo['customerid']);
        $goalsIdData = array_column($customerGoals, 'customergoalId');
        // dd($surplusData['total_surplus']);
         /*$price = array_column($Goalsdata, 'goalcost');
         array_multisort($price, SORT_ASC, $Goalsdata);*/
         // dd($Goalsdata);
        $GoalsArr = array();
        $GoalsAchArr = array();
        $GoalsFutureArr = array();
        $goalAmount = "0";
        foreach ($Goalsdata as $key => $value) {
          // echo $value['customergoalid'];
           if($key == 0)
          {
            $goalAmount = $value['goalcost'];
          }
          else
          {
            $goalAmount += $value['goalcost'];
          }

          if($goalAmount <= $surplusData['total_surplus'])
          {

           /* if($key != 1)
          {
          }*/
            //$goalAmount += $value['goalcost'];
          // if(in_array(, haystack))
          $value['goaltype'] = "Achievable";
          if(in_array($value['customergoalid'], $goalsIdData))
          {
              
              $customerGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalId($value['customergoalid']);
        // dd($customerGoalsDetails);
        $lum_data = $this->fundperformance->getCustomerLumpsumSipData($value['customergoalid'],'L');
        $sip_data = $this->fundperformance->getCustomerLumpsumSipData($value['customergoalid'],'S');
        $yearmonth = floor($customerGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $customerGoalsDetails['yearmonth'] = "months";
        }
        else
        {
          $customerGoalsDetails['yearmonth'] = "year";
        }
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['customergoalid']);
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = number_format(($growth*100),2);
       $customerGoalsDetails['bargrowth'] = number_format(($bargrowth*100),2);
       $mytime = Carbon::now();
       $goaldate = $customerGoalsDetails['createdutcdatetime'];
        $ts1 = strtotime($customerGoalsDetails['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $customerGoalsDetails['customergoalid'] = $customerGoalsDetails['customergoalId'];
        $customerGoalsDetails['lumpsumamount'] = $lum_data['lum_sip'];
        $customerGoalsDetails['sipamount'] = $sip_data['lum_sip'];
        $customerGoalsDetails['customerid'] = $value['customerid'];
        $customerGoalsDetails['timetaken'] = $diff;
        $customerGoalsDetails['totalsaved'] = $totCur;
        $customerGoalsDetails['goal_status'] = "completed";
        array_push($GoalsArr,$customerGoalsDetails);
          }
          else
          {
              $value['goal_status'] = "started";

              array_push($GoalsArr,$value);
          }
            
            //array_push($GoalsArr,$value);
          }
          else
          {
             $goalAmount = $goalAmount-$value['goalcost'];
            $value['goaltype'] = "Future";
            // unset($goalAmount);
            if(in_array($value['customergoalid'], $goalsIdData))
          {
              $customerGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalId($value['customergoalid']);
        // dd($customerGoalsDetails);
        $yearmonth = floor($customerGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $customerGoalsDetails['yearmonth'] = "months";
        }
        else
        {
          $customerGoalsDetails['yearmonth'] = "year";
        }
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['customergoalid']);
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = number_format(($growth*100),2);
       $customerGoalsDetails['bargrowth'] = number_format(($bargrowth*100),2);
       $mytime = Carbon::now();
       $goaldate = $customerGoalsDetails['createdutcdatetime'];
        $ts1 = strtotime($customerGoalsDetails['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $customerGoalsDetails['timetaken'] = $diff;
        $customerGoalsDetails['customergoalid'] = $customerGoalsDetails['customergoalId'];
        $customerGoalsDetails['customerid'] = $value['customerid'];
        $customerGoalsDetails['totalsaved'] = $totCur;
        $customerGoalsDetails['goal_status'] = "completed";
        array_push($GoalsArr,$customerGoalsDetails);
          }
          else
          {
              $value['goal_status'] = "started";
              array_push($GoalsArr,$value);
          }
           
            
          }
        }
        
        // dd($customerGoals);
       // $GoalsArr['Achievable'] = $GoalsAchArr;
       // $GoalsArr['Future'] = $GoalsFutureArr;
        // print_r($goalAmount);
         $goalscnt = array_column($GoalsArr, 'goal_status');
    $glscnt = array_count_values($goalscnt);
    if(isset($glscnt['started']))
{
    $glscnt['started'] = $glscnt['started'];
}
else
{
  $glscnt['started'] = 0;
}
if(isset($glscnt['completed']))
{
    $glscnt['completed'] = $glscnt['completed'];
}
else
{
  $glscnt['completed'] = 0;
}
    $goals_completed['goals_completed'] = $glscnt['completed'];
    $goals_completed['goals_started'] = $glscnt['started'];
      if(empty($goals_completed))
  {
    $goals_completed['goals_completed'] = 0;
    $goals_completed['goals_started'] = 0;
  }
	   return response()->json([
          "GoalsList" => $GoalsArr,
          "goalCount" => $goals_completed
        ], 200);
    }

     public function getGoalsDetailsList(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255',
            'goal_id' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $data = $this->goals->getGoalsById($request['goal_id'],$getCustomerInfo['customerid']);
        // dd($data);
        $assests = $this->fundclass->getFundClassAssestType();
        $assestsArray = array();
        $assestsArray2 = array();
        $assVal = 100/count($assests);
        //print_r($assests);exit();
        
        $mytime = Carbon::now();
         $goaldate = $data['createdutcdatetime'];
        $ts1 = strtotime($data['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

       $goaldetails['goalname'] = $data['goalname'];
       $goaldetails['goalpriority'] = $data['goalpriority'];
       $goaldetails['goalcost'] = $data['goalcost'];
       $goaldetails['futurecost'] = $data['futurecost'];
       $goaldetails['yearcommitment'] = (($data['futurecost']/$data['timeframe'])*12);
       $goaldetails['monthcommitment'] = round($goaldetails['yearcommitment']/12);
       $goaldetails['year'] = floor($data['timeframe']/12);
       $goaldetails['month'] = $data['timeframe']%12;
       $goaldetails['timetaken'] = $diff;
       $goaldetails['timeframe'] = $data['timeframe'];
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($request['goal_id']);

       if($assetsData)
       {
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
     }
     else
     {
      $totInv = "";
      $totCur = "";
     }
       if($totInv)
       {
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$data['futurecost']);
       }
       else
       {
        $growth = 0;
       $bargrowth = 0;
       }

       /*foreach ($assests as $key => $value) {
          $assval[$value['assettype']] = $value['assettype'];
           $assval[$value['assettype']] = $assVal;          
        if($value['assettype'] == "Debt")
          {
           $assval1['goal_ass_id'] = "";
           $assval1['assettype'] = "Debt";
           $assval1['asset_value'] = 0;//(($goaldetails['yearcommitment']*$assVal)/100);
           $assval1['asset_percentage'] = 25;
           //Sip
           $assval22['goal_ass_id'] = "";
           $assval22['assettype'] = "Debt";
           $assval22['asset_value'] = (($goaldetails['monthcommitment']*25)/100);
           $assval22['asset_percentage'] = 25;
           $assval22['duration'] = $goaldetails['timeframe'];
           array_push($assestsArray,$assval1);
           array_push($assestsArray2,$assval22);
          }
            if($value['assettype'] == "Equity")
          {
           $assval2['goal_ass_id'] = "";
           $assval2['assettype'] = "Equity";
           $assval2['asset_value'] = 0;//(($goaldetails['yearcommitment']*$assVal)/100);
           $assval2['asset_percentage'] = 25;
           //Sip
           $assval23['goal_ass_id'] = "";
           $assval23['assettype'] = "Equity";
           $assval23['asset_value'] = (($goaldetails['monthcommitment']*25)/100);
           $assval23['asset_percentage'] = 25;
           $assval23['duration'] = $goaldetails['timeframe'];
           array_push($assestsArray,$assval2);
           array_push($assestsArray2,$assval23);
          }
          if($value['assettype'] == "Liquid")
          {
            $assval3['goal_ass_id'] = "";
           $assval3['assettype'] = "Liquid";
           $assval3['asset_value'] = 0;//(($goaldetails['yearcommitment']*$assVal)/100);
           $assval3['asset_percentage'] = 25;
           //Sip
           $assval24['goal_ass_id'] = "";
           $assval24['assettype'] = "Liquid";
           $assval24['asset_value'] = (($goaldetails['monthcommitment']*25)/100);
           $assval24['asset_percentage'] = 25;
           $assval24['duration'] = $goaldetails['timeframe'];
           array_push($assestsArray,$assval3);
           array_push($assestsArray2,$assval24);
          }
          if($value['assettype'] == "Gold")
          {
            $assval4['goal_ass_id'] = "";
            $assval4['assettype'] = "Gold";
           $assval4['asset_value'] = 0;//(($goaldetails['yearcommitment']*$assVal)/100);
           $assval4['asset_percentage'] = 25;
           //Sip
           $assval25['goal_ass_id'] = "";
           $assval25['assettype'] = "Gold";
           $assval25['asset_value'] = (($goaldetails['monthcommitment']*25)/100);
           $assval25['asset_percentage'] = 25;
           $assval25['duration'] = $goaldetails['timeframe'];
           array_push($assestsArray,$assval4);
           array_push($assestsArray2,$assval25);
          }

        }*/
       //array_push($assestsArray,$assval);
        //dd($assestsArray);
        //$allocationData = $request->json()->all();
        $goalsData = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$request['goal_id']);
        // dd($goalsData);
        $customerRiskProfileScore = round($this->riskprofile->getCustomerRiskProfileScore($getCustomerInfo['customerid']));
         $start = $data['timeframe'];
         $end = $data['timeframe'];
        $wealthAssets = $this->goalsallocation->getWealthAssestsByRiskScore($customerRiskProfileScore,$start,$end,'Goal');
        // $goalCount = count($g)
        // dd($wealthAssets);
        $lumpsum_amount = 0;
        if(!$goalsData)
        {
          $wealthLumSumm = array();
        $wealthSipSumm = array();
        if($wealthAssets['largecap'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'Equity';
           $wealthlum['asset_value'] = (($wealthAssets['largecap'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['largecap'];
           $wealthlum['lum_sip_type'] = "";

           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'Equity';
           $wealthsip['asset_value'] = (($wealthAssets['largecap'] * $goaldetails['monthcommitment'])/100);
           $wealthsip['asset_percentage'] = $wealthAssets['largecap'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);

        }
        
        if($wealthAssets['midterm'] != '0')
        {
           $wealthlum['goal_ass_id'] = "";
           $wealthlum['assettype'] = 'Debt';
           $wealthlum['asset_value'] = (($wealthAssets['midterm'] * $lumpsum_amount)/100);
           $wealthlum['asset_percentage'] = $wealthAssets['midterm'];
           $wealthlum['lum_sip_type'] = "";
           
           $wealthsip['goal_ass_id'] = "";
           $wealthsip['assettype'] = 'Debt';
           $wealthsip['asset_value'] = (($wealthAssets['midterm'] * $goaldetails['monthcommitment'])/100);
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
           $wealthsip['asset_value'] = (($wealthAssets['liquid'] * $goaldetails['monthcommitment'])/100);
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
           $wealthsip['asset_value'] = (($wealthAssets['gold'] * $goaldetails['monthcommitment'])/100);
           $wealthsip['asset_percentage'] = $wealthAssets['gold'];
           $wealthsip['lum_sip_type'] = "";

           array_push($wealthLumSumm, $wealthlum);
           array_push($wealthSipSumm, $wealthsip);

        }
        // dd($wealthLumSumm);
        foreach($wealthLumSumm as $key =>$value)
        {
            $reqdata['customerid'] = $getCustomerInfo['customerid'];
            $reqdata['goalid'] = $request['goal_id'];
            $reqdata['asset'] = $value['assettype'];
            $reqdata['asset_value'] = $value['asset_value'];
            $reqdata['asset_percentage'] = ($value['asset_percentage'])?$value['asset_percentage']: '0';
            $reqdata['lumpsum_sip'] = 0;
            $reqdata['purchase_type'] = "L";
            $reqdata['duration'] = 0;
            $data = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqdata);
        }
        foreach($wealthSipSumm as $key =>$value)
        {
            $reqdata['customerid'] = $getCustomerInfo['customerid'];
            $reqdata['goalid'] = $request['goal_id'];
            $reqdata['asset'] = $value['assettype'];
            $reqdata['asset_value'] = $value['asset_value'];
            $reqdata['asset_percentage'] = ($value['asset_percentage'])?$value['asset_percentage']: '0';
            $reqdata['lumpsum_sip'] = $goaldetails['monthcommitment'];
            $reqdata['purchase_type'] = "S";
            $reqdata['duration'] = $goaldetails['timeframe'];
            $data = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqdata);
        }



        /*for($i=1;$i<=2;$i++)
        {
           // echo $i;
        foreach ($assestsArray as $key => $value) {
           
        //$getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
        $reqData['goalid'] = $request['goal_id'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        if($i == 1)
        {
        $reqData['asset'] = $value['assettype'];
        $reqData['asset_value'] = 0;
        $reqData['asset_percentage'] = $value['asset_percentage'];
        $reqData['lumpsum_sip'] = 0;
        $reqData['purchase_type'] = "L";
        }
        else
        {
          $reqData['asset'] = $value['assettype'];
        $reqData['asset_value'] = (($goaldetails['monthcommitment']*25)/100);
        $reqData['asset_percentage'] = $value['asset_percentage'];
        $reqData['lumpsum_sip'] = $goaldetails['monthcommitment'];
          $reqData['purchase_type'] = "S";
           $reqData['duration'] = $goaldetails['timeframe'];
        }
            $customerGoalsDetails = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqData);
           // $status = "Goals Allocation Added Successfully";
    }
 }*/

    if($data)
          {
            $goalsData = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$request['goal_id']);
            $goalsLumSumm = array();
       $goalsSipSumm = array();
       foreach ($goalsData as $key => $value) {
        if($value['purchase_type'] == "L")
        {
          $goals['lumpsum_amount'] = $value['lumpsum_sip'];
          $goalsdet1['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet1['assettype'] = $value['asset'];
           $goalsdet1['asset_value'] = $value['asset_value'];
           $goalsdet1['asset_percentage'] = ($value['asset_percentage'])?$value['asset_percentage']: '0';
           $goalsdet1['lum_sip_type'] = $value['lum_sip_type'];
           array_push($goalsLumSumm, $goalsdet1);
        }
        else
        {
          $goals['sip_amount'] = $value['lumpsum_sip'];
          $goalsdet['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet['assettype'] = $value['asset'];
           $goalsdet['asset_value'] = $value['asset_value'];
           $goalsdet['asset_percentage'] = ($value['asset_percentage'])?$value['asset_percentage']: '0';
           $goalsdet['lum_sip_type'] = $value['lum_sip_type'];
           $goalsdet['duration'] = $value['duration'];
           array_push($goalsSipSumm, $goalsdet);
        }
           
       }
       /*$goals['Lumpsum'] = $goalsLumSumm;
       $goals['Sip'] = $goalsSipSumm;*/

       $goaldetails['Lumpsum'] = $goalsLumSumm;
       $goaldetails['Sip_Amount'] = $goals['sip_amount'];
       $goaldetails['Lumpsum_Amount'] = $goals['lumpsum_amount'];
       $goaldetails['Sip'] = $goalsSipSumm;
       
          }
       $goaldetails['Lumpsum'] = $goalsLumSumm;
       $goaldetails['Sip_Amount'] = $goals['sip_amount'];
       $goaldetails['Lumpsum_Amount'] = $goals['lumpsum_amount'];
       $goaldetails['Sip'] = $goalsSipSumm;
       /*$goaldetails['Lumpsum'] = $assestsArray;
       $goaldetails['Sip_Amount'] = $goaldetails['monthcommitment'];
       $goaldetails['Lumpsum_Amount'] = "0";
       $goaldetails['Sip'] = $assestsArray2;*/
        if($goalsLumSumm[0]['lum_sip_type'] == "checked")
       $goaldetails['lumpsum_check'] = "true";
       else
       $goaldetails['lumpsum_check'] = "false";
     if($goalsSipSumm[0]['lum_sip_type'] == "checked")
       $goaldetails['sip_check'] = "true";
       else
       $goaldetails['sip_check'] = "false";
}
else
{
  $customerGoalsDetails = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$request['goal_id']);
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
       /*$goals['Lumpsum'] = $goalsLumSumm;
       $goals['Sip'] = $goalsSipSumm;*/

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

       
}
       $goaldetails['growth'] = number_format(($growth*100),2);
       $goaldetails['bargrowth'] = number_format(($bargrowth*100),2);
       $goaldetails['totalsaved'] = $totCur;
       
       return response()->json([
          "GoalsDetails" => $goaldetails
        ], 200);
    }

     public function getGoalsSummaryList(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerInvestAmnt = $this->fundperformance->getCustomerSumInvestmentPostTran($getCustomerInfo['customerid']);
        $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
        $wealthAllocateData = "";
        $newWealthArr = array();
         if($wealthData)
         {
          $wealthAllocateData = $this->fundperformance->getCustomerWealthAllocate($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);
         // dd($wealthAllocateData);
          $wealthAllocateData1['totalcurrentvalue'] = $wealthAllocateData[0]['totalcurrentvalue'];
          $wealthAllocateData1['investmentvalue'] = $wealthAllocateData[0]['investmentvalue'];

          $wealthAllocateData1['wealthid'] = $wealthData[0]['cust_wel_all'];
          $wealthAllocateData1['lumpsum_amount'] = $wealthData[0]['lumpsum_amount'];
          $wealthAllocateData1['sip_amount'] = $wealthData[0]['sip_amount'];
          $wealthAllocateData1['timeframe'] = $wealthData[0]['timeframe'];
          array_push($newWealthArr,$wealthAllocateData1);
         }
           if($newWealthArr)
           {
                $newWealthArr = $newWealthArr;
           }
          else
            {
              $newWealthArr = array();
            }
        $savingsArray = array();
        // dd($customerInvestAmnt);
        //if($customerInvestAmnt['purchase1'])
        foreach ($customerInvestAmnt['purchase1'] as $key => $value) {
            $currentSavings = $value['units'] * $value['nav'];
            array_push($savingsArray, $currentSavings);
        }
        if(!empty($value))
        $customerInvestAmntArr['start_date'] = $value['startdate'];
        
        // dd($customerInvestAmntArr);
        $customerRiskProfileScore = $this->riskprofile->getCustomerRiskProfileScore($getCustomerInfo['customerid']);
        if($customerRiskProfileScore <= 20)
        {
            $riskcategory = "Secure";
        }
        elseif($customerRiskProfileScore >= 21 && $customerRiskProfileScore <=40)
        {
            $riskcategory = "Moderately Secure";
        }
        elseif($customerRiskProfileScore >= 41 && $customerRiskProfileScore <=60)
        {
            $riskcategory = "Moderate";
        }
        elseif($customerRiskProfileScore >= 61 && $customerRiskProfileScore <=80)
        {
            $riskcategory = "Aggressive";
        }
        elseif($customerRiskProfileScore >= 81 && $customerRiskProfileScore <=100)
        {
            $riskcategory = "Highly Aggressive";
        }
        $customerTransLog = $this->fundperformance->getCustomerPostTransLogs($getCustomerInfo['customerid']);
        
       // dd($customerTransLog);
        //Goals
        $customerGoals = $this->fundperformance->getCustomerGoals($getCustomerInfo['customerid']);

        // dd($customerGoals);
        $newGoalsArray = array();
        $totalInvestValue = array();
        $totalCurrentValue = array();
        foreach ($customerGoals as $key => $value) {
          //echo $value['customergoalId'];
          $customerGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalId($value['customergoalId']);
          // dd($customerGoalsDetails);
          $lum_data = $this->fundperformance->getCustomerLumpsumSipData($value['customergoalId'],'L');
          $sip_data = $this->fundperformance->getCustomerLumpsumSipData($value['customergoalId'],'S');
          $customerGoalsDetails['sipamount'] = $sip_data['lum_sip'];
          $customerGoalsDetails['lumpsumamount'] = $lum_data['lum_sip'];
         // dd($sip_data['lum_sip']);
        $yearmonth = floor($customerGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $customerGoalsDetails['yearmonth'] = "months";
        }
        else
        {
          $customerGoalsDetails['yearmonth'] = "year";
        }
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['customergoalId']);
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $totalInvestValue[] = $totInv;
       $totalCurrentValue[] = $totCur;
       $customerGoalsDetails['totalsaved'] = $totCur;
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = number_format(($growth*100),2);
       $customerGoalsDetails['bargrowth'] = number_format(($bargrowth*100),2);
        $mytime = Carbon::now();
        $goaldate = $customerGoalsDetails['createdutcdatetime'];
        $ts1 = strtotime($customerGoalsDetails['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $customerGoalsDetails['timetaken'] = $diff;
        $customerGoalsDetails['goal_status'] = "completed";
          // dd($customerGoalsDetails);
        array_push($newGoalsArray, $customerGoalsDetails);
        }
        // echo $diff;
//Unfinished Code
  $customerNewGoals = $this->goals->getGoalsList($getCustomerInfo['customerid']);
  $newGoals = array_column($customerGoals, 'customergoalId');
  // dd($customerNewGoals);
  foreach ($customerNewGoals as $keys => $values) {
    if(!in_array($values['customergoalid'], $newGoals))
    {
      $customerNewGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalId($values['customergoalid']);
      // print_r($customerNewGoalsDetails);
      $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($values['customergoalid']);
      $yearmonth = floor($customerNewGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $newGoalsData['yearmonth'] = "months";
        }
        else
        {
          $newGoalsData['yearmonth'] = "year";
        }
       $newArr = array();
       $mytime = Carbon::now();
       $goaldate = $customerNewGoalsDetails['createdutcdatetime'];
        $ts1 = strtotime($values['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        //$customerGoalsDetails['timetaken'] = $diff;

      $newGoalsData['customergoalId'] = $values['customergoalid'];
      $newGoalsData['goalname'] = $values['goalname'];
      $newGoalsData['futurecost'] = $values['futurecost'];
      $newGoalsData['goalpriority'] = $values['goalpriority'];
      $newGoalsData['timeframe'] = $values['timeframe'];
      $newGoalsData['sipamount'] = $customerNewGoalsDetails['sipamount'];
      $newGoalsData['lumpsumamount'] = $customerNewGoalsDetails['lumpsumamount'];
      $newGoalsData['createdutcdatetime'] = $values['createdutcdatetime'];
      $newGoalsData['growth'] = "0.00";
      $newGoalsData['bargrowth'] = "0.00";
      $newGoalsData['timetaken'] = $diff;
      $newGoalsData['goal_status'] = "started";
          // dd($customerGoalsDetails);
        array_push($newGoalsArray, $newGoalsData);
    }
    // dd($newGoalsArray);
    $goalscnt = array_column($newGoalsArray, 'goal_status');
    $glscnt = array_count_values($goalscnt);

    if(isset($glscnt['started']))
{
    $glscnt['started'] = $glscnt['started'];
}
else
{
  $glscnt['started'] = 0;
}
if(isset($glscnt['completed']))
{
    $glscnt['completed'] = $glscnt['completed'];
}
else
{
  $glscnt['completed'] = 0;
}
    $goals_completed['goals_completed'] = $glscnt['completed'];
    $goals_completed['goals_started'] = $glscnt['started'];
    
  }
  if(empty($goals_completed))
  {
    $goals_completed['goals_completed'] = 0;
    $goals_completed['goals_started'] = 0;
  }
//End
        $customerInvestAmntArr['purchase'] = array_sum($totalInvestValue);
        $customerInvestAmntArr['purchasesavings'] = array_sum($totalCurrentValue);
       return response()->json([
          "Savings_Summary" => $customerInvestAmntArr,
          "Risk_Score" => $customerRiskProfileScore,
          "riskcategory" => $riskcategory,
          "Transaction_Log" => $customerTransLog,
          "Goals" => $newGoalsArray,
          "Wealth" => $newWealthArr,
          "GoalsCount" => $goals_completed
        ], 200);
    }

    public function getUserGoalsSummaryList(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        //Goals
        $customerGoals = $this->fundperformance->getCustomerGoals($getCustomerInfo['customerid']);
        //dd($customerGoals);
       return response()->json([
          "Goals" => $customerGoals
        ], 200);
    }

    public function getGoalsSummaryListWithGoalId(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $customerGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalId($request['goalid']);
        // dd($customerGoalsDetails);
        $lum_data = $this->fundperformance->getCustomerLumpsumSipData($request['goalid'],'L');
        $sip_data = $this->fundperformance->getCustomerLumpsumSipData($request['goalid'],'S');
        $customerGoalsDetails['sipamount'] = $sip_data['lum_sip'];
        $customerGoalsDetails['lumpsumamount'] = $lum_data['lum_sip'];
        $yearmonth = floor($customerGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $customerGoalsDetails['yearmonth'] = "months";
        }
        else
        {
          $customerGoalsDetails['yearmonth'] = "year";
        }
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($request['goalid']);
       // dd($assetsData);
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $customerGoalsDetails['totalsaved'] = $totCur;
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = number_format(($growth*100),2);
       $customerGoalsDetails['bargrowth'] = number_format(($bargrowth*100),2);
       $mytime = Carbon::now();
       $goaldate = $customerGoalsDetails['createdutcdatetime'];
        $ts1 = strtotime($customerGoalsDetails['createdutcdatetime']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $customerGoalsDetails['timetaken'] = $diff;
        // dd($assetsData);
       foreach ($assetsData as $key => $value) {
       /* $d = array(['TotalInvestmentValue'.':'.$value['TotalInvestmentValue']],['TotalCurrentValue'.':'.$value['TotalCurrentValue']],['AssetType'.':'.$value['AssetType']],['Growth'.':'.$value['Growth']]);*/
        $d['AssetType'] = $value['AssetType'];
        $d['TotalCurrentValue'] = $value['TotalCurrentValue'];
        array_push($newArr, $d);
        // array_push($newArr, $v1);
       }
      // return $newArr;
        $customerGoalsDetails['goalsAssests'] = $assetsData;
        $customerGoalsDetails['goalsdunet'] = $newArr;
/*
        $customerGoalsDetails['goalsAllocatedFunds'] = $this->fundperformance->getGoalsSummaryFundsListWithGoalId($request['goalid']);*/
        // dd($customerGoalsDetails);
// New 

      $fundclassassests = $this->fundperformance->getCustomerAssets($request['goalid']);
      $fundAssets = array();
      // dd($fundclassassests);
      foreach($fundclassassests as $key =>$value)
      {
         $assests['assettype'] = $value['assettype'];
         // $assests['assetname'] = $value['subcategory'];
         $fundclassData = $this->fundclass->getSelectedFundClassDataNew($value['assettype'],$value['fundclassid']);

         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getGoalsSummaryFundsListWithGoalIdNew($request['goalid'],$value1['fundclassid']);
           // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {
              //dd($value2);
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['purchasetype'] = $value2['purchasetype'];
              $products['startdate'] = $value2['startdate'];
              $products['investmentvalue'] = $value2['investmentvalue'];
              $products['units'] = $value2['units'];
              $products['currentvalue'] = $value2['currentvalue'];
              $products['Growth'] = number_format(($value2['Growth']),2);
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         $assests['fundclass'] = $fundClass;
         array_push($fundAssets, $assests);
      }
      $customerGoalsDetails['goalsAllocatedFunds'] = $fundAssets;
       return response()->json([
          "GoalsSummaryDetails" => $customerGoalsDetails
        ], 200);
    }

        public function getWealthSummaryListWithWealthId(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'wealth_id' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        
      $customerGoalsDetails = $this->wealthallocation->getWealthAllocationById($request['wealth_id']);
        // dd($customerGoalsDetails);
        $lum_data = $this->fundperformance->getCustomerLumpsumSipData($request['wealth_id'],'L');
        $sip_data = $this->fundperformance->getCustomerLumpsumSipData($request['wealth_id'],'S');
        $customerGoalsDetails['sipamount'] = $sip_data['lum_sip'];
        $customerGoalsDetails['lumpsumamount'] = $lum_data['lum_sip'];
        $yearmonth = floor($customerGoalsDetails['timeframe']/12);;
        if($yearmonth == 0)
        {
          $customerGoalsDetails['yearmonth'] = "months";
        }
        else
        {
          $customerGoalsDetails['yearmonth'] = "year";
        }
       /*$assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($request['goalid']);
       // dd($assetsData);
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $customerGoalsDetails['totalsaved'] = $totCur;
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = number_format(($growth*100),2);
       $customerGoalsDetails['bargrowth'] = number_format(($bargrowth*100),2);*/
       $mytime = Carbon::now();
       $goaldate = $customerGoalsDetails['created_at'];
        $ts1 = strtotime($customerGoalsDetails['created_at']);
        $ts2 = strtotime($mytime);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $customerGoalsDetails['timetaken'] = $diff;
      // dd($customerGoalsDetails);
      $fundclassassests = $this->dashboardrecordsinfo->getWealthAssetsTypes($request['wealth_id']);
      // dd($fundclassassests);
      $fundAssets = array();
      foreach($fundclassassests as $key =>$value)
      {
        $goalsAssData = $this->dashboardrecordsinfo->getGoalsDetailsForFunds($request['wealth_id'],$value['asset']);
     // dd($goalsAssData);
        $goalsAssetstypesData = $this->dashboardrecordsinfo->getWealthAllocationAssetstypesNew($request['wealth_id'],$value['assettype']);
        // dd($goalsAssetstypesData);
      $fundclassData = $this->fundclass->getFundClassDataForWealth($goalsAssData['assettype'],$goalsAssetstypesData);
         // if($fundclassData)
          $assests['assettype'] = $value['assettype'];
         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['assetcategory'] = $value1['asset_category'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
            $limit = 5;
              $viewmore = "";
              $fundclassid = $value1['fundclassid'];
              $fundprodcutsData = $this->fundperformance->getWealthSummaryFundsListWithWealthIdNew($request['wealth_id'],$fundclassid);
           
           // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['startdate'] = $value2['startdate'];
              $products['investmentvalue'] = $value2['investmentvalue'];
              $products['units'] = $value2['units'];
              $products['currentvalue'] = $value2['currentvalue'];
              $products['Growth'] = number_format(($value2['Growth']),2);
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         $assests['fundclass'] = $fundClass;
         // dd($assests);
         array_push($fundAssets, $assests);
      }
      $customerGoalsDetails['wealthAllocatedFunds'] = $fundAssets;
      return response()->json([
              'WealthSummaryDetails' => $customerGoalsDetails
          ], 200);
    }

    public function goalsAssestsAllocation(Request $request)
    {
        $allocationData = $request->json()->all();
        $purtype = array_unique(array_column($allocationData, 'purchase_type'));
        // dd($purtype); 
        $getCustomerInfo = $this->customer->getUserDetailsrow($allocationData[0]['userid']);
        $purArr = array("L","S");
        // dd($purtype);
        foreach ($purArr as $key1 => $value1) {
          // if($value1 == "")
          if(in_array($value1, $purtype))
        {

          $reqData3['lum_sip_type'] = "checked";
          $GoalAssetUpdDetails = $this->dashboardrecordsinfo->updateGoalAssetStatus($getCustomerInfo['customerid'],$allocationData[0]['goalid'],$value1,$reqData3);
        }
        else
        {
          $reqData3['lum_sip_type'] = "";
          $GoalAssetUpdDetails = $this->dashboardrecordsinfo->updateGoalAssetStatus($getCustomerInfo['customerid'],$allocationData[0]['goalid'],$value1,$reqData3);
        }
        }
        $GoalAssetDetails = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$allocationData[0]['goalid']);
        $goalsAssetCnt = count($allocationData);
        $goalsAssCount = count($GoalAssetDetails);
        if($goalsAssetCnt != $goalsAssCount)
        {
          $removeFundsArr = "";
            $fundaddedData = $this->fundroi->RemoveCustomerFunds($getCustomerInfo['customerid'],$allocationData[0]['goalid'],$removeFundsArr);
        }
        // dd($GoalAssetDetails);
     /*   $GoalAssetDetails = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$allocationData[0]['goalid']);
        // dd($goalsAssData);
        $goalsLumSip = array_unique(array_column($allocationData, 'purchase_type'));
        dd($goalsLumSip);
        foreach ($goalsLumSip as $key => $value) {
          # code...
        }*/
        // dd($assetscount);
        foreach ($allocationData as $key => $value) {
            
       $validator = Validator::make($value, [
            'goalid' => 'required|string|max:255',
            'userid' => 'required|string|max:255',
            'asset' => 'required|string|max:255',
            //'asset_value' => 'required|in|max:255',
            //'asset_percentage' => 'required|string|max:255',
            'purchase_type' => 'required|string|max:255',
           // 'lum_sip'=> 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['goalid'] = $value['goalid'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['asset'] = $value['asset'];
        $reqData['asset_value'] = $value['asset_value'];
        $reqData['asset_percentage'] = $value['asset_percentage'];
        $reqData['purchase_type'] = $value['purchase_type'];
        $reqData['lumpsum_sip'] = $value['lum_sip'];
        // $reqData['lum_sip'] = $value['lum_sip'];
        /*if(in_array($reqData['purchase_type'], $purtype))
        {
          $reqData['lum_sip_type'] = "checked";
        }*/
        /*else
        {
        $reqData['lum_sip_type'] = $value['lum_sip_type'];
        }*/
        $GoalAssetLumSip = $this->dashboardrecordsinfo->getGoalsAllocationLumSipDetails($getCustomerInfo['customerid'],$value['goalid'],$value['purchase_type'],$value['asset']);
        if($GoalAssetLumSip['asset_value'] == $value['asset_value'])
        {
            $removeFundsArr = "";
            $fundaddedData = $this->fundroi->RemoveCustomerFunds($getCustomerInfo['customerid'],$value['goalid'],$removeFundsArr);
        }
        if($reqData['purchase_type'] == "S")
        {
        $reqData['duration'] = $value['duration'];
        //$reqData['end_date'] = $value['end_date'];
        }
        
        if($value['goal_ass_id'])
        {
            $customerGoalsDetails = $this->dashboardrecordsinfo->UpdateGoalsAssestsAllocation($reqData,$value['goal_ass_id']); 
            $status = "Goals Allocation Updated Successfully";  
        }
        else
        {
            $customerGoalsDetails = $this->dashboardrecordsinfo->AddGoalsAssestsAllocation($reqData);
            $status = "Goals Allocation Added Successfully";
        }
    }
       return response()->json([
          "GoalsSummaryDetails" => $customerGoalsDetails,
          "status" => $status
        ], 200);
    }

    public function getgoalsAssestsAllocation(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'goalid' => 'required|string|max:255',
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);

            $customerGoalsDetails = $this->dashboardrecordsinfo->getGoalsAllocationDetails($getCustomerInfo['customerid'],$request['goalid']);
            // dd($customerGoalsDetails);
        if($customerGoalsDetails)
    {
       
       $goals['goalid'] = $customerGoalsDetails[0]['goalid'];
       $goals['customerid'] = $customerGoalsDetails[0]['customerid'];
    }
    else
    {
       $goals['lumpsum_sip'] = "";
       $goals['goalid'] = "";
       $goals['purchase_type'] = "";
       $goals['customerid'] = "";
    }
       
       $goalsLumSumm = array();
       $goalsSipSumm = array();
       foreach ($customerGoalsDetails as $key => $value) {
        if($value['purchase_type'] == "L")
        {
          $goals['lumpsum_amount'] = $value['lumpsum_sip'];
          $goalsdet1['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet1['asset'] = $value['asset'];
           $goalsdet1['asset_value'] = $value['asset_value'];
           $goalsdet1['asset_percentage'] = $value['asset_percentage'];
           $goalsdet1['lum_sip_type'] = $value['lum_sip_type'];
           array_push($goalsLumSumm, $goalsdet1);
        }
        else
        {
          $goals['sip_amount'] = $value['lumpsum_sip'];
          $goalsdet['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet['asset'] = $value['asset'];
           $goalsdet['asset_value'] = $value['asset_value'];
           $goalsdet['asset_percentage'] = $value['asset_percentage'];
           $goalsdet['lum_sip_type'] = $value['lum_sip_type'];
           array_push($goalsSipSumm, $goalsdet);
        }
           
       }
       if($goalsLumSumm[0]['lum_sip_type'] == "checked")
       $goals['lumpsum_check'] = "true";
       else
       $goals['lumpsum_check'] = "false";

       if($goalsSipSumm[0]['lum_sip_type'] == "checked")
       $goals['sip_check'] = "true";
       else
       $goals['sip_check'] = "false";

       $goals['Lumpsum'] = $goalsLumSumm;
       $goals['Sip'] = $goalsSipSumm;
      // $goals['GoalsSummaryDetails'] = $goalsSumm;
       return response()->json([
           $goals,
        ], 200);
    }


     public function getGoalsWealthList(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerGoals = $this->fundperformance->getCustomerWealthGoalsAllocate($getCustomerInfo['customerid']);
        // dd($customerGoals);
        $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
         if($wealthData)
         {
         $wealthAllocateData = $this->fundperformance->getCustomerWealthAllocate($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);
         // dd($wealthAllocateData);
          $wealthAllocateData['wealthid'] = $wealthData[0]['cust_wel_all'];
          $wealthAllocateData['lumpsum_amount'] = $wealthData[0]['lumpsum_amount'];
          $wealthAllocateData['sip_amount'] = $wealthData[0]['sip_amount'];
          $wealthAllocateData['timeframe'] = $wealthData[0]['timeframe'];
          if($wealthAllocateData)
            $wealthAllocateData = $wealthAllocateData;
          else
            $wealthAllocateData = array();
         }
         else
         {
          $wealthAllocateData = array();
         }
        $goalwealth = array();
        foreach ($customerGoals as $key => $value) {
           $gw['goalname'] = $value['goalname'];
           $gw['goalid'] = $value['customergoalId'];
           $gw['futurecost'] = $value['futurecost'];
           $gw['totalcurrentvalue'] = $value['totalcurrentvalue'];
           $gw['investmentvalue'] = $value['investmentvalue'];
           $gw['goalpriority'] = $value['goalpriority'];
           $gw['year'] = floor($value['timeframe']/12);
           $gw['month'] = $value['timeframe']%12;
           $gw['sipamount'] = $value['sipamount'];
           $gw['lumpsumamount'] = $value['lumpsumamount'];
           array_push($goalwealth, $gw);
        }
       return response()->json([
          "Goals" => $goalwealth,
          "Wealth" => $wealthAllocateData
        ], 200);
    }


    public function getNewUserAddedGoals(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerGoals = $this->fundperformance->getCustomerWealthGoalsAllocate($getCustomerInfo['customerid']);
        $customerNewGoals = $this->fundroi->getUserNewGoals($getCustomerInfo['customerid']);
        
        $goalsNew = array_column($customerNewGoals,'customergoalid');
        $goalsExisted = array_column($customerGoals,'customergoalId');
        $userNewGoals = array_diff($goalsNew,$goalsExisted);
        // dd($userNewGoals);
        $GoalsData = $this->fundroi->getUserNewGoalsList($getCustomerInfo['customerid'],$userNewGoals);
        // dd($GoalsData);
        $goalwealth = array();
        if($GoalsData)
        {
        foreach ($GoalsData as $key => $value) {
           $gw['goalname'] = $value['goalname'];
           $gw['goalid'] = $value['customergoalid'];
           $gw['futurecost'] = $value['futurecost'];
           if(isset($value['totalcurrentvalue']))
           $gw['totalcurrentvalue'] = $value['totalcurrentvalue'];
           else
           $gw['totalcurrentvalue'] = "";
           $gw['goalpriority'] = $value['goalpriority'];
           $gw['year'] = floor($value['timeframe']/12);
           $gw['month'] = $value['timeframe']%12;
           $gw['sipamount'] = $value['sipamount'];
           $gw['lumpsumamount'] = $value['lumpsumamount'];
           array_push($goalwealth, $gw);
        }
      }
      else
      {
        $goalwealth = [];
      }
       return response()->json([
          "Goals" => $goalwealth
        ], 200);
    }


    public function getGoalsWealthListWithId(Request $request)
    {
        // dd($request->json()->all());
        $goalsFundsArr = array();
        $customerGoals = $request->json()->all();
    foreach ($customerGoals as $keys => $values) {
       
       $validator = Validator::make($values, [
            'userid' => 'required|string|max:255',
            'goalid' => 'required|string|max:255',
            'goal_wealth_type' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($values['userid']);
       /*$orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);*/
       // dd($request['goal_wealth']);
       // echo $values['goal_wealth_type'];
      if($values['goal_wealth_type'] == "wealth")
      {
        $customerGoals = $this->fundperformance->getCustomerWealthData($getCustomerInfo['customerid'],$values['goalid']);
        // dd($customerGoals);

        $goalsFunds = array();
       foreach($customerGoals as $gkey =>$gvalue)
       {
           $goals['goalname'] = "wealth";
           $goals['goalid'] = $gvalue['cust_wel_all'];
           // $goals['futurecost'] = $gvalue['futurecost'];
           $goals['totalcurrentvalue'] = $gvalue['totalcurrentvalue'];
           // $goals['goalpriority'] = $gvalue['goalpriority'];
           $goals['year'] = floor($gvalue['timeframe']/12);
           $goals['month'] = $gvalue['timeframe']%12;
    $customerGoalsAssets = $this->fundperformance->getCustomerGoalsFundsAssetsNew($getCustomerInfo['customerid'],$gvalue['cust_wel_all']);
      $fundAssets = array();
      foreach($customerGoalsAssets as $key =>$value)
      {
         $assests['assettype'] = $value['assettype'];
         $fundclassData = $this->fundperformance->getUserWealthSummaryFundsListWithWealthId($getCustomerInfo['customerid'],$gvalue['cust_wel_all'],$value['assettype']);
         $fundClass = array();
         // dd($fundclassData);
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['assettype'] = $value1['assettype'];
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getCustomerGoalsFundProducts($getCustomerInfo['customerid'],$gvalue['cust_wel_all'],$value1['fundclassid']);
           // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {          
         /*$checkFundStatus = $this->fundroi->checkCustomerSelectedFund($reqData);
          if($checkFundStatus)
          $products['fundstatus'] = "checked";
          else
          $products['fundstatus'] = "unchecked";*/
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['asset_category'] = $value2['asset_category'];
              $products['asset'] = $value2['asset'];
              $products['units'] = $value2['units'];
              $products['purchasevalue'] = $value2['purchasevalue'];
              $products['currentvalue'] = $value2['currentvalue'];
              $products['folionumber'] = trim($value2['folionumber']);
             /* $products['amccode'] = $value2['amccode'];
              $products['AUM'] = number_format($value2['incret'],2);
              $products['oneM'] = number_format($value2['1monthret'],2);
              $products['sixM'] = number_format($value2['6monthret'],2);
              $products['oneY'] = number_format($value2['1yrret'],2);
              $products['threeY'] = number_format($value2['3yearet'],2);
              $products['fiveY'] = number_format($value2['5yearret'],2);*/
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         $assests['fundclass'] = $fundClass;
         array_push($fundAssets, $assests);
      }
      $goals['goalproducts'] = $fundAssets;
         array_push($goalsFunds, $goals);
  }
  // print_r($goalsFunds);
   array_push($goalsFundsArr, $goalsFunds);
      }
      else
      {
        $customerGoals1 = $this->fundperformance->getCustomerWealthGoals($getCustomerInfo['customerid'],$values['goalid']);
       // dd($customerGoals);
       $goalsFunds1 = array();
       foreach($customerGoals1 as $gkey1 =>$gvalue1)
       {
        $goals1['goalname'] = $gvalue1['goalname'];
           $goals1['goalid'] = $gvalue1['customergoalId'];
           $goals1['futurecost'] = $gvalue1['futurecost'];
           $goals1['totalcurrentvalue'] = $gvalue1['totalcurrentvalue'];
           $goals1['goalpriority'] = $gvalue1['goalpriority'];
           $goals1['year'] = floor($gvalue1['timeframe']/12);
           $goals1['month'] = $gvalue1['timeframe']%12;
    $customerGoalsAssets1 = $this->fundperformance->getCustomerGoalsFundsAssets($getCustomerInfo['customerid'],$gvalue1['customergoalId']);
      $fundAssets1 = array();
      foreach($customerGoalsAssets1 as $keys1 =>$values1)
      {
         $assests['assettype'] = $values1['assettype'];
         $fundclassData1 = $this->fundperformance->getUserGoalsSummaryFundsListWithGoalId($getCustomerInfo['customerid'],$gvalue1['customergoalId'],$values1['assettype']);
         $fundClass1 = array();
         foreach($fundclassData1 as $key12 => $value12)
         {
            $fund1['fundclassid'] = $value12['fundclassid'];
            $fund1['assettype'] = $value12['assettype'];
            $fundProducts1 = array();
           $fundprodcutsData1 = $this->fundperformance->getCustomerGoalsFundProducts($getCustomerInfo['customerid'],$gvalue1['customergoalId'],$value12['fundclassid']);
           // dd($fundprodcutsData);
         foreach($fundprodcutsData1 as $key21 => $value21)
         {          
         
              $products2['fundid'] = $value21['fundid'];
              $products2['fundname'] = $value21['fundname'];
              $products2['asset_category'] = $value21['asset_category'];
              $products2['asset'] = $value21['asset'];
              $products2['units'] = $value21['units'];
              $products2['purchasevalue'] = $value21['purchasevalue'];
              $products2['currentvalue'] = $value21['currentvalue'];
              $products2['folionumber'] = trim($value21['folionumber']);
            
              array_push($fundProducts1, $products2);
         }
              $fund1['fundproducts'] = $fundProducts1;
            array_push($fundClass1, $fund1);
         }
         $assests['fundclass'] = $fundClass1;
         array_push($fundAssets1, $assests);
      }
      $goals1['goalproducts'] = $fundAssets1;
         array_push($goalsFunds1, $goals1);
  }
  // print_r($goalsFunds);
   array_push($goalsFundsArr, $goalsFunds1);
      }
       
}
return response()->json([
              'funds' => $goalsFundsArr
          ], 200);
      
    }

    //Allocate Your Money
public function CustomerAllocateNewFundSelection(Request $request)
   {
            // dd($request->json()->all());
        $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
          'orderdate' => 'required|string|max:255',
          'fundid' => 'required|string|max:255',
          'orderstatus' => 'required|string|max:255',
          'customergoalid' => 'required|string|max:100',
          'purchasetype' => 'required|string|max:100',
          'startdate' => 'required|string|max:255',
          'amount' => 'required|string|max:255'
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
      $checkFund = $this->fundrecord->CheckFundExistsInvest($getCustomerInfo['customerid'],$request['customergoalid'],$request['fundid'],$request['purchasetype']);
      if($checkFund)
      {
        $IdsArr['customerid'] = $getCustomerInfo['customerid'];
        $IdsArr['goalid'] = $request['customergoalid'];
        $IdsArr['fundid'] = $request['fundid'];
        $IdsArr['purchasetype'] = $request['purchasetype'];
          $reqData['fundid'] = $request['fundid'];
          $reqData['purchasetype'] = $request['purchasetype'];
          $reqData['customergoalid'] = $request['customergoalid'];
          $reqData['customerid'] = $getCustomerInfo['customerid'];
        if($request['purchasetype'] == "L")
          $reqData['lumpsumamount'] = $request['amount'];
          else
          $reqData['sipamount'] = $request['amount'];

        $fundselectionDetailsData = $this->fundroi->updateCustomerFundValue($reqData,$IdsArr);
        $status = "fund selection updated Successfully";
        // dd($fundselectionDetailsData);
      }
      else
      {
      $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
      if($orderstatus)
      {
        // dd($orderstatus);
          $reqData1['fundid'] = $request['fundid'];
          $reqData1['purchasetype'] = $request['purchasetype'];
          $reqData1['customergoalid'] = $request['customergoalid'];
          $reqData1['startdate'] = $request['startdate'];
          $reqData1['createdutcdatetime'] = Carbon::now();
          $reqData1['modifiedutcdatetime'] = Carbon::now();
          // foreach ($purchaseArr as $key1 => $value1) {
            if($request['purchasetype'] == "L")
          $reqData1['lumpsumamount'] = $request['amount'];
          else
          $reqData1['sipamount'] = $request['amount'];
         $reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
         $reqData1['customerorderid'] = $orderstatus['customerorderid'];
         $reqData1['purchasetype'] = $request['purchasetype'];
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
          $status = "fund selection added Successfully";
        // }
      }
      else
      {

      $reqData['customerid'] = $getCustomerInfo['customerid'];
      $reqData['orderdate'] = $request['orderdate'];
      $reqData['orderno'] = "3658663575".mt_rand(10,100);
      $reqData['customerorderid'] = "FJ456-SSD5-DDDD-FDGJ-DDSF-KJSDDF3575".mt_rand(10,100);
      $reqData1['fundid'] = $request['fundid'];
      
      $reqData['orderstatus'] = $request['orderstatus'];
      $reqData1['customergoalid'] = $request['customergoalid'];
      $reqData1['startdate'] = $request['startdate'];
      $reqData1['createdutcdatetime'] = Carbon::now();
      $reqData1['modifiedutcdatetime'] = Carbon::now();
     
      $fundselectionData = $this->fundrecord->InsertCustomerOrderPretran($reqData);
      //dd($fundselectionData);
      if($fundselectionData == 0 || $fundselectionData)
      {
        
          $reqData1['customerorderid'] = $reqData['customerorderid'];
           // foreach ($purchaseArr as $key1 => $value1) {
$reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
          $reqData1['purchasetype'] = $request['purchasetype'];
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
          $status = "fund selection added Successfully";
        // }
      }

      }
    }
      return response()->json([
              'fundselection' => "fund amount allocated Successfully"
          ], 200);
    }
    

    //End

        public function CustomerNewFundSelection(Request $request)
   {
            // dd($request->json()->all());
        $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
          'orderdate' => 'required|string|max:255',
          'fundid' => 'required|string|max:255',
          'orderstatus' => 'required|string|max:255',
          'customergoalid' => 'required|string|max:100',
          'purchasetype' => 'required|string|max:100',
          'startdate' => 'required|string|max:255',
          'amount' => 'required|string|max:255'
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);


      }
      
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
      $checkFund = $this->fundrecord->CheckFundExistsInvest($getCustomerInfo['customerid'],$request['customergoalid'],$request['fundid']);
      // dd($checkFund);
        $purchaseArr = array("L","S");
      if($checkFund)
      {
        $IdsArr['customerid'] = $getCustomerInfo['customerid'];
        $IdsArr['goalid'] = $request['customergoalid'];
        $IdsArr['fundid'] = $request['fundid'];
        $IdsArr['purchasetype'] = $request['purchasetype'];
          $reqData['fundid'] = $request['fundid'];
          $reqData['purchasetype'] = $request['purchasetype'];
          $reqData['customergoalid'] = $request['customergoalid'];
          $reqData['customerid'] = $getCustomerInfo['customerid'];
        if($request['purchasetype'] == "L")
          $reqData['lumpsumamount'] = $request['amount'];
          else
          $reqData['sipamount'] = $request['amount'];

        $fundselectionDetailsData = $this->fundroi->updateCustomerFundValue($reqData,$IdsArr);
        $status = "fund selection updated Successfully";
        // dd($fundselectionDetailsData);
      }
      else
      {
      $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
      if($orderstatus)
      {
        // dd($orderstatus);
          $reqData1['fundid'] = $request['fundid'];
          $reqData1['purchasetype'] = $request['purchasetype'];
          $reqData1['customergoalid'] = $request['customergoalid'];
          $reqData1['startdate'] = $request['startdate'];
          $reqData1['createdutcdatetime'] = Carbon::now();
          $reqData1['modifiedutcdatetime'] = Carbon::now();
          foreach ($purchaseArr as $key1 => $value1) {
            if($request['purchasetype'] == $value1)
          $reqData1['lumpsumamount'] = $request['amount'];
          else
          $reqData1['sipamount'] = "";
         $reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
         $reqData1['customerorderid'] = $orderstatus['customerorderid'];
         $reqData1['purchasetype'] = $value1;
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
          $status = "fund selection added Successfully";
        }
      }
      else
      {

      $reqData['customerid'] = $getCustomerInfo['customerid'];
      $reqData['orderdate'] = $request['orderdate'];
      $reqData['orderno'] = "3658663575".mt_rand(10,100);
      $reqData['customerorderid'] = "FJ456-SSD5-DDDD-FDGJ-DDSF-KJSDDF3575".mt_rand(10,100);
      $reqData1['fundid'] = $request['fundid'];
      
      $reqData['orderstatus'] = $request['orderstatus'];
      $reqData1['customergoalid'] = $request['customergoalid'];
      $reqData1['startdate'] = $request['startdate'];
      $reqData1['createdutcdatetime'] = Carbon::now();
      $reqData1['modifiedutcdatetime'] = Carbon::now();
     
      $fundselectionData = $this->fundrecord->InsertCustomerOrderPretran($reqData);
      //dd($fundselectionData);
      if($fundselectionData == 0 || $fundselectionData)
      {
          $reqData1['customerorderid'] = $reqData['customerorderid'];
           foreach ($purchaseArr as $key1 => $value1) {
$reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
          $reqData1['purchasetype'] = $value1;
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
          $status = "fund selection added Successfully";
        }
      }

      }
      return response()->json([
              'fundselection' => "fund selection added Successfully"
          ], 200);
     }
     return response()->json([
              'fundselection' => $status
          ], 200);
    }


     public function getGoalsWealthCurrInvest(Request $request)
    {
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerGoals = $this->fundperformance->getCustomerWealthGoalsAllocate($getCustomerInfo['customerid']);
         $wealthData = $this->wealthallocation->getWealthAllocation($getCustomerInfo['customerid']);
         $wealthAllocateData = array();
         if($wealthData)
         {
         $wealthAllocateData = $this->fundperformance->getCustomerWealthAllocate($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);
         // dd($wealthAllocateData);
       $wealthAllocateData['wealthid'] = $wealthData[0]['cust_wel_all'];
       $wealthAllocateData['lumpsum_amount'] = $wealthData[0]['lumpsum_amount'];
          $wealthAllocateData['sip_amount'] = $wealthData[0]['sip_amount'];
          $wealthAllocateData['timeframe'] = $wealthData[0]['timeframe'];
         }
        $goalwealth = array();
        foreach ($customerGoals as $key => $value) {
           $gw['goalname'] = $value['goalname'];
           $gw['goalid'] = $value['customergoalId'];
           $gw['futurecost'] = $value['futurecost'];
           $gw['totalcurrentvalue'] = $value['totalcurrentvalue'];
           $gw['investmentvalue'] = $value['investmentvalue'];
           $gw['goalcost'] = $value['goalcost'];
           $gw['goalpriority'] = $value['goalpriority'];
           $gw['year'] = floor($value['timeframe']/12);
           $gw['month'] = $value['timeframe']%12;
           $gw['sipamount'] = $value['sipamount'];
           $gw['lumpsumamount'] = $value['lumpsumamount'];
           array_push($goalwealth, $gw);
        }
       return response()->json([
          "Goals" => $goalwealth,
          "Wealth" => $wealthAllocateData
        ], 200);
    }


    public function getGoalsWealthPartialFunds(Request $request)
    {
        // dd($request->json()->all());
        $redeemFunds = array();
        $customerGoals = $request->json()->all();
    foreach ($customerGoals as $keys => $values) {
       
       $validator = Validator::make($values, [
            'userid' => 'required|string|max:255',
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($values['userid']);
       /*$orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);*/
       $customerGoals = $this->fundperformance->getCustomerWealthGoals($getCustomerInfo['customerid'],$values['goalid']);
       // print_r($customerGoals);
       $goalsFunds = array();
       foreach($customerGoals as $gkey =>$gvalue)
       {
        $goals['goalname'] = $gvalue['goalname'];
           $goals['goalid'] = $gvalue['customergoalId'];
           $goals['goalpriority'] = $gvalue['goalpriority'];
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getCustomerRedeemFundProducts($getCustomerInfo['customerid'],$gvalue['customergoalId']);
           // dd($fundprodcutsData);
           $lumProductsArray = array();
            $sipProductsArray = array();
         foreach($fundprodcutsData as $key2 => $value2)
         {          
            /*if($value2['purchasetype'] == "L")
              {*/
                $fundredemData1 = $this->fundroi->getFundLumpsumRedemption($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalId']);
                // dd($fundredemData1);
                $fundprodcutsDataNewPur = $this->fundperformance->getCustomerRedeemFundProductsNew($getCustomerInfo['customerid'],$gvalue['customergoalId'],$value2['fundid']);
                // dd($fundprodcutsDataNewPur);
                if($fundprodcutsDataNewPur)
                {
                 $newPurchasevalue = $value2['purchasevalue']-$fundprodcutsDataNewPur['purchasevalue'];
                 $newunits = $value2['units']-$fundprodcutsDataNewPur['units'];
                 $newcurrentvalue = $value2['currentvalue']-$fundprodcutsDataNewPur['currentvalue'];
                }
                else
                {
                  $newPurchasevalue = $value2['purchasevalue'];
                  $newunits = $value2['units'];
                 $newcurrentvalue = $value2['currentvalue'];
                }
                //dd($fundredemData1);
                if(!empty($fundredemData1['amount']))
                {
                $redmvalue1 = $newPurchasevalue-$fundredemData1['amount'];
                $redmAmnt = $fundredemData1['amount'];
                }
                else
                {
                    $redmvalue1 = $newPurchasevalue;
                    $redmAmnt = 0;
                }

                    $fundproducts1['fundid'] = $value2['fundid'];
                    $fundproducts1['fundname'] = $value2['fundname'];
                    $fundproducts1['asset_category'] = $value2['asset_category'];
                    $fundproducts1['asset'] = $value2['asset'];
                    $fundproducts1['purchasetype'] = $value2['purchasetype'];
                    $fundproducts1['units'] = $newunits;
                    $fundproducts1['purchasevalue'] = $newPurchasevalue;
                    $fundproducts1['currentvalue'] = $newcurrentvalue;
                    $fundproducts1['fundredamount'] = $redmAmnt;
                    $fundproducts1['balamount'] = $redmvalue1;
                    $fundproducts1['folionumber'] = trim($value2['folionumber']);
                    
                array_push($lumProductsArray, $fundproducts1);
/*                $reqData['lumpsumamount'] = $fundvalue;
                $reqData1['fundid'] = $value2['fundid'];
                $reqData1['goalid'] = $request['goalid'];
                $reqData1['purchasetype'] = $value2['purchasetype'];
                $reqData1['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['lumpsumamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData,$reqData1);*/
              //}
              /*else
              {
            $fundredemData = $this->fundroi->getFundSipRedemption($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalId']);
            if(!empty($fundredemData['amount']))
                $redmvalue = $fundredemData['amount'];
            else
                $redmvalue = 0;

                    $fundproducts2['fundid'] = $value2['fundid'];
                    $fundproducts2['fundname'] = $value2['fundname'];
                    $fundproducts2['purchasetype'] = $value2['purchasetype'];
                    $fundproducts2['sipamount'] = $value2['sipamount'];
                    $fundproducts2['purchasevalue'] = $value2['purchasevalue'];
                    $fundproducts2['currentvalue'] = $value2['currentvalue'];
                    $fundproducts2['units'] = $value2['units'];
                    $fundproducts2['fundredamount'] = $redmvalue;
                    $fundproducts2['balamount'] = $value2['purchasevalue']-$redmvalue;
                    $fundproducts2['folionumber'] = trim($value2['folionumber']);
                    array_push($sipProductsArray, $fundproducts2);
                /*$reqData2['sipamount'] = $fundvalue;
                $reqData3['fundid'] = $value2['fundid'];
                $reqData3['goalid'] = $request['goalid'];
                $reqData3['purchasetype'] = $value2['purchasetype'];
                $reqData3['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['sipamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData2,$reqData3);*/
              //}
              //$fundproductsArr['Lumpsum'] = $lumProductsArray;
              //$fundproductsArr['Sip'] = $sipProductsArray;
         }
              $goals['fundproducts'] = $lumProductsArray;
            array_push($goalsFunds, $goals);
         }
         array_push($redeemFunds, $goalsFunds);
}
return response()->json([
              'funds' => $redeemFunds
          ], 200);
      
    }

    public function customerFundsRedemption(Request $request)
    {
      $fundsData = $request->json()->all();
      foreach ($fundsData as $key => $value) {
        
         $validator = Validator::make($value, [
          'userid' => 'required|string|max:100',
          'goalid' => 'required|string|max:100',
          'fundid' => 'required|string|max:100',
          'purchasetype' => 'required|string|max:100',
          'fundvalue' => 'required|max:100',
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
      $getCustomerOrder = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
      if($getCustomerOrder)
      {
        $reqData['orderdetailid'] = "DJ456-SSD5-DDDD-".mt_rand(10,10000)."-DDSF-KJSDF88675".mt_rand(10,10000);
        $reqData['customerorderid'] = $getCustomerOrder['customerorderid'];
        $reqData['customergoalid'] = $value['goalid'];
        $reqData['fundid'] = $value['fundid'];
        $reqData['purchasetype'] = $value['purchasetype'];
        $reqData['paymenttype'] = "Redemption";
        if($value['purchasetype'] == "l" || $value['purchasetype'] == "L")
        $reqData['lumpsumamount'] = $value['fundvalue'];
        else
        $reqData['sipamount'] = $value['fundvalue'];
  $fundDetailsUpd = $this->fundroi->InsertCustomerFundRedemption($reqData);
      }
      else
      {
        $reqData['customerorderid'] = "DJ456-SSD5-DDDD-".mt_rand(10,10000)."-DDSF-KJSDF88675".mt_rand(10,10000);
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['orderno'] =   "56896".mt_rand(10,10000);
        $reqData['orderstatus'] = "pending";
        $reqData['createdutcdatetime'] = carbon::now();
        $reqData['modifiedutcdatetime'] = carbon::now();

        $fundOrderEntry = $this->fundrecord->InsertCustomerOrderPretran($reqData);
        // dd($fundOrderEntry);
        if($fundOrderEntry == 0)
        {
          $reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-".mt_rand(10,10000)."-DDSF-KJSDF88675".mt_rand(10,10000);
        $reqData1['customerorderid'] = $reqData['customerorderid'];
        $reqData1['customergoalid'] = $value['goalid'];
        $reqData1['fundid'] = $value['fundid'];
        $reqData1['purchasetype'] = $value['purchasetype'];
        $reqData1['paymenttype'] = "Redemption";
        if($value['purchasetype'] == "l" || $value['purchasetype'] == "L")
        $reqData1['lumpsumamount'] = $value['fundvalue'];
        else
        $reqData1['sipamount'] = $value['fundvalue'];
  $fundDetailsUpd = $this->fundroi->InsertCustomerFundRedemption($reqData1);
        }
      }
  }
  // dd($fundDetailsUpd);
    if($fundDetailsUpd == 0)
    {
      return response()->json([
              'status' => "Fund Redemption Successfully"
          ], 200);
    }

    }

public function getRedemptionSummary(Request $request)
    {
        // dd($request->json()->all());
        $redeemFunds = array();
        $customerGoals = $request->json()->all();
    //foreach ($customerGoals as $keys => $values) {
       
       $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
            //'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       $fundredem = $this->fundroi->getRedemptionSummaryDetails($getCustomerInfo['customerid']);
       // dd($fundredem);
       /*$customerGoals = $this->fundperformance->getCustomerWealthGoals($getCustomerInfo['customerid'],$values['goalid']);*/
       // print_r($customerGoals);
       $goalsFunds = array();
       $lumProductsArray = array();
       foreach($fundredem as $gkey =>$gvalue)
       {
        //$goals['goalname'] = $gvalue['goalname'];
           // echo $goals['goalid'] = $gvalue['customergoalid'];
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getCustomerRedeemFundProductsSummaryNew($getCustomerInfo['customerid'],$gvalue['customergoalid']);
           // dd($fundprodcutsData);
           
            $sipProductsArray = array();
            // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {          
            
            /*if($value2['purchasetype'] == "L")
              {*/
                $fundredemData1 = $this->fundroi->getFundLumpsumRedemptionNew($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalid']);
                // print_r($fundredemData1);
                $fundprodcutsDataNewPur = $this->fundperformance->getCustomerRedeemFundProductsNew($getCustomerInfo['customerid'],$gvalue['customergoalid'],$value2['fundid']);
                // dd($fundprodcutsDataNewPur);
                if($fundprodcutsDataNewPur)
                {
                 $newPurchasevalue = $value2['purchasevalue']-$fundprodcutsDataNewPur['purchasevalue'];
                 $newunits = $value2['units']-$fundprodcutsDataNewPur['units'];
                 $newcurrentvalue = $value2['currentvalue']-$fundprodcutsDataNewPur['currentvalue'];
                }
                else
                {
                  $newPurchasevalue = $value2['purchasevalue'];
                  $newunits = $value2['units'];
                 $newcurrentvalue = $value2['currentvalue'];
                }
              if(!empty($fundredemData1['amount']))
              {
                // echo $value2['fundid'];
                    $redmvalue1 = $fundredemData1['amount'];
                    $fundproducts1['fundid'] = $value2['fundid'];
                    $fundproducts1['fundname'] = $value2['fundname'];
                    $fundproducts1['asset_category'] = $value2['asset_category'];
                    $fundproducts1['asset'] = $value2['asset'];
                    $fundproducts1['purchasetype'] = $value2['purchasetype'];
                   /* $fundproducts1['units'] = $value2['units'];
                    $fundproducts1['purchasevalue'] = $value2['purchasevalue'];
                    $fundproducts1['currentvalue'] = $value2['currentvalue'];*/
                    $fundproducts1['existingamount'] = $newPurchasevalue;
                    $fundproducts1['amounttoredeem'] = $redmvalue1;
                    $fundproducts1['balanceamount'] = $newPurchasevalue-$redmvalue1;
                array_push($lumProductsArray, $fundproducts1);
              
            }
              // $fundproductsArr['Lumpsum'] = $lumProductsArray;
                      //$fundproductsArr['Sip'] = $sipProductsArray;
         // print_r($fundproductsArr);  
         }       
         // $fundproductsArr['Lumpsum'] = $lumProductsArray;
         // dd($fundproductsArr);
         }
         if(!empty($lumProductsArray))
         {

         $totalinstantredeem = array_sum(array_column($lumProductsArray, 'amounttoredeem'));
         }
         else
         {
            $lumProductsArray = array();
            $totalinstantredeem = array();
         }
         array_push($goalsFunds, $lumProductsArray);
        // array_push($redeemFunds, $goalsFunds);
//}
return response()->json([
              'fundproducts' => $goalsFunds,
              'totalinstantredeem' => $totalinstantredeem
          ], 200);
      
    }

    public function getSipRedemptionSummary(Request $request)
       {
        $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
            //'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       $sipSummary = $this->fundperformance->getModifiedCustomerSipSummary($getCustomerInfo['customerid']);
       $sipArray = array();
       foreach ($sipSummary as $key => $value) {
         $sip['fundid'] = $value['fundid'];
         $sip['fundname'] = $value['fundname'];
         $sip['asset_category'] = $value['asset_category'];
         $sip['asset'] = $value['asset'];
         $sip['purchasetype'] = $value['purchasetype'];
         $sip['currentvalue'] = round($value['currentvalue']);
         $sip['customergoalid'] = $value['customergoalid'];
         $sip['goalname'] = $value['goalname'];
         $sip['goalpriority'] = $value['goalpriority'];
         $sip['sipdate'] = $value['transactiondate'];
         array_push($sipArray, $sip);
       }
        return response()->json([
              'status' => 'success',
              'sip_summary' => $sipArray
          ],200);
    }

public function getSipRedemptionSummaryAfterAmountChange(Request $request)
       {
        $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
            //'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       $sipSummary = $this->fundperformance->getModifiedCustomerSipSummary($getCustomerInfo['customerid']);
       $sipArray = array();
       foreach ($sipSummary as $key => $value) {
         $sip['fundid'] = $value['fundid'];
         $sip['fundname'] = $value['fundname'];
         $sip['purchasetype'] = $value['purchasetype'];
         $sip['currentvalue'] = round($value['currentvalue']);
         $sip['customergoalid'] = $value['customergoalid'];
         $sip['goalname'] = $value['goalname'];
         $sip['goalpriority'] = $value['goalpriority'];
         array_push($sipArray, $sip);
       }
        return response()->json([
              'status' => 'success',
              'sip_summary' => $sipArray
          ],200);
    }

public function getSipModifiedSummary(Request $request)
       {
        $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
            'modify_type' => 'required|string|max:255',
            'fundid' => 'required|string|max:255',
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        // dd($value['goalid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
      if($request['modify_type'] == "change_amount")
      {
        $validator = Validator::make($request->json()->all(), [
            'amount' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid'],$request['fundid']);
        // dd($fundSipData);
        if($fundSipData)
        {
          $arr['transactionstatus'] = "cancelled";
          $idsArr['fundid'] = $request['fundid'];
          $idsArr['goalid'] = $request['goalid'];
          $idsArr['customerorderid'] = $fundSipData['customerorderid'];
          $updateSipData = $this->fundroi->updateSipModifiedData($arr,$idsArr);
          // dd($updateSipData);
          if($updateSipData)
          {
            $reqData['fundid'] = $request['fundid'];
            $reqData['customergoalid'] = $request['goalid'];
            $reqData['purchasetype'] = "S";
            $reqData['sipamount'] = $request['amount'];
            $reqData['customerorderid'] = $fundSipData['customerorderid'];
            $reqData['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF88675".mt_rand(10,10000);
            $fundDetailsUpd = $this->fundroi->InsertCustomerFundRedemption($reqData);
            if($fundDetailsUpd || $fundDetailsUpd == 0)
            {
              return response()->json([
              'status' => 'success',
             // 'sip_summary' => $sipArray
          ],200);
            }
            
          }
          else
          {
            return response()->json([
              'status' => 'failed',
              //'sip_summary' => $sipArray
          ],400);
          }
          
        }
      }
      elseif ($request['modify_type'] == "cancel") {
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid'],$request['fundid']);
        if($fundSipData)
        {
          $arr['transactionstatus'] = "cancelled";
          $idsArr['fundid'] = $request['fundid'];
          $idsArr['goalid'] = $request['goalid'];
          $idsArr['customerorderid'] = $fundSipData['customerorderid'];
          $updateSipData = $this->fundroi->updateSipModifiedData($arr,$idsArr);
          if($updateSipData)
          {
              return response()->json([
              'status' => 'success',
             // 'sip_summary' => $sipArray
          ],200);            
          }
          else
          {
            return response()->json([
              'status' => 'failed',
              //'sip_summary' => $sipArray
          ],400);
          }
          
        }
      }
      elseif ($request['modify_type'] == "change_date") {
        $validator = Validator::make($request->json()->all(), [
            'date' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid'],$request['fundid']);
        if($fundSipData)
        {
          $arr['transactionstatus'] = "cancelled";
          $idsArr['fundid'] = $request['fundid'];
          $idsArr['goalid'] = $request['goalid'];
          $idsArr['customerorderid'] = $fundSipData['customerorderid'];
          $updateSipData = $this->fundroi->updateSipModifiedData($arr,$idsArr);
          if($updateSipData)
          {
            $reqData['fundid'] = $request['fundid'];
            $reqData['customergoalid'] = $request['goalid'];
            $reqData['purchasetype'] = "S";
            $reqData['startdate'] = $request['date'];
            $reqData['customerorderid'] = $fundSipData['customerorderid'];
             $reqData['sipamount'] = $fundSipData['sipamount'];
            $reqData['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF88675".mt_rand(10,10000);
            $fundDetailsUpd = $this->fundroi->InsertCustomerFundRedemption($reqData);
            if($fundDetailsUpd == 0)
            {
              return response()->json([
              'status' => 'success',
             // 'sip_summary' => $sipArray
          ],200);
            }
            
          }
          else
          {
            return response()->json([
              'status' => 'failed',
              //'sip_summary' => $sipArray
          ],400);
          }
          
        }
      }
        
    }

    public function getAssetRebalancing(Request $request)
       {

         $datasArray = array();
         // dd($request->json()->all());
        foreach ($request->json()->all() as $key => $value) {
          
        $validator = Validator::make($value, [
            'userid' => 'required|string|max:255',
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }

        $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
        $goalsAssests = $this->dashboardrecordsinfo->getGoalsAllocationDetailsForRebalancing($getCustomerInfo['customerid'],$value['goalid']);
        $data = array();
       // dd($goalsAssests);
        if($goalsAssests)
        {
        $data['userid'] = $value['userid'];
        $data['goal'] = $goalsAssests[0]['goalname'];
        $data['goal_priority'] = $goalsAssests[0]['goalpriority'];
        $assdata = array();
        $datas = array();
      foreach ($goalsAssests as $key1 => $value1) {
        if($value1['asset'] == "Equity")
        {
        $data1['asset'] = $value1['asset'];  
        $data1['asset_value'] = $value1['asset_value'];
        $data1['asset_percentage'] = $value1['asset_percentage'];
        $customerGoalsDetails = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['goalid'],$value1['asset']);
        if($customerGoalsDetails)
        {
          $data1['changed_value'] = 3500;
          $data1['changed_percentage'] = (3500/100);
        }
        else
        {
          $data1['changed_value'] = $value1['asset_value'];
        $data1['changed_percentage'] = $value1['asset_percentage'];
        }
        // dd(round($customerGoalsDetails['TotalCurrentValue']));
        array_push($datas,$data1);
        }
        if($value1['asset'] == "Debt")
        {
        
        $data1['asset'] = $value1['asset'];  
        $data1['asset_value'] = $value1['asset_value'];
        $data1['asset_percentage'] = $value1['asset_percentage'];
        $customerGoalsDetails = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['goalid'],$value1['asset']);
        if($customerGoalsDetails)
        {
          $data1['changed_value'] = 3000;
          $data1['changed_percentage'] = (3000/100);
        }
        else
        {
          $data1['changed_value'] = $value1['asset_value'];
        $data1['changed_percentage'] = $value1['asset_percentage'];
        }
        array_push($datas,$data1);
        }
        // $data1['Debt'] = $value1['asset_value'];
        if($value1['asset'] == "Liquid")
        {
         
        $data1['asset'] = $value1['asset'];  
        $data1['asset_value'] = $value1['asset_value'];
        $data1['asset_percentage'] = $value1['asset_percentage'];
        $customerGoalsDetails = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($value['goalid'],$value1['asset']);
        if($customerGoalsDetails)
        {
          $data1['changed_value'] = 2000;
          $data1['changed_percentage'] = (2000/100);
        }
        else
        {
          $data1['changed_value'] = $value1['asset_value'];
        $data1['changed_percentage'] = $value1['asset_percentage'];
        }
        array_push($datas,$data1);
        }
        // $data1['Liquid'] = $value1['asset_value'];
        if($value1['asset'] == "Gold")
        {
         
        $data1['asset'] = $value1['asset'];  
        $data1['asset_value'] = $value1['asset_value'];
        $data1['asset_percentage'] = $value1['asset_percentage'];
        $customerGoalsDetails = $this->fundperformance->getGoalsSummaryListWithGoalIdAndAsset($value['goalid'],$value1['asset']);
        if($customerGoalsDetails)
        {
          $data1['changed_value'] = 1500;
          $data1['changed_percentage'] = (1500/100);
        }
        else
        {
          $data1['changed_value'] = $value1['asset_value'];
        $data1['changed_percentage'] = $value1['asset_percentage'];
        }
        array_push($datas,$data1);
        }
        // $data1['Gold'] = $value1['asset_value'];
      }
              // dd($datas);
      // array_push($datas,$data1);
      // $data['Rebalancing'] = $datas;

          return response()->json([
              'status' => 'success',
              'goal_priority' => $goalsAssests[0]['goalpriority'],
              'goal' => $goalsAssests[0]['goalname'],
              'goalid' => $goalsAssests[0]['customergoalid'],
               "Rebalancing" =>$datas,
            //'Our Recommendation'=> $data3
          ],200);
    }
     //$datasArray['Rebalancing'] = $data;

    //$goalsAssetData['Rebalancing'] = $datas;
    //array_push($data,$goalsAssetData);
      /*
          $data = "1";
         $data1 = "1st Goal (Mayras postgraduation in US)";
         $data2 = array(array(
           'Debt' => "3,50,000",
           'Equity' => "2,00,000",
           'Gold' => "1,50,000",
           'Liquid' => "3,00,000",
            'Current Allocation' => "3,00,000",
       ));//

          $data3 = array(array(
            'Debt' => "3,50,000",
            'Equity' => "2,00,000",
            'Gold' => "1,50,000",
            'Liquid' => "3,00,000",
             'Current Allocation' => "3,00,000",
        ));//*/
        //}

        /*$data = "1";
         $data1 = "1st Goal (Mayras postgraduation in US)";
         $data2 = array(array(
           'asset' => "Debt",
           'asset_value' => "200000",
           'asset_percentage' => "20",
           'changed_value' => "300000",
            'changed_percentage' => "30",
       ),
       array(
           'asset' => "Equity",
           'asset_value' => "300000",
           'asset_percentage' => "30",
           'changed_value' => "400000",
            'changed_percentage' => "40",
       ),
       array(
           'asset' => "Liquid",
           'asset_value' => "200000",
           'asset_percentage' => "20",
           'changed_value' => "100000",
            'changed_percentage' => "10",
       ),
       array(
           'asset' => "Gold",
           'asset_value' => "300000",
           'asset_percentage' => "30",
           'changed_value' => "200000",
            'changed_percentage' => "20",
       )
       );//

        return response()->json([
              'status' => 'success',
              'goal_priority' => $data,
              'goal' => $data1,
              'Rebalancing' => $data2,
            //'Our Recommendation'=> $data3
          ],200);*/
        }
    }

     public function addChangedAssetsRebalance(Request $request)
    {
      $assetChange = $request->json()->all();
      foreach ($assetChange as $key => $value) {
        
      $validator = Validator::make($value, [
            'asset' => 'required|string|max:255',
            'asset_value' => 'required|max:255',
            'asset_percentage' => 'required|max:255',
            'asset_changed_value' => 'required|max:255',
            'asset_changed_percentage' => 'required|max:255',
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['goalid'] = $value['goalid'];
        $reqData['asset'] = $value['asset'];
        $reqData['asset_value'] = $value['asset_value'];
        $reqData['asset_percentage'] = $value['asset_percentage'];
        $reqData['asset_changed_value'] = $value['asset_changed_value'];
        $reqData['asset_changed_percentage'] = $value['asset_changed_percentage'];
if ($reqData['asset_changed_percentage'] > $reqData['asset_percentage']) 
{
  $reqData['status'] = "Added";
  $reqData['red_add_amount'] = $reqData['asset_changed_percentage'] - $reqData['asset_percentage'];
}
else
{
  $reqData['status'] = "Reduced";
  $reqData['red_add_amount'] = $reqData['asset_percentage'] - $reqData['asset_changed_percentage'];
}
if($value['rbl_id'])
{
  $insertReb =$this->assetrebalancing->updateAssetsRebalancing($reqData,$value['rbl_id']);
        if($insertReb)
        {
          return response()->json([
              'status' => 'updated'
          ],200);
        }
}
else
{
  $insertReb =$this->assetrebalancing->addAssetsRebalancing($reqData);
        if($insertReb)
        {
          return response()->json([
              'status' => 'success'
          ],200);
        }
}
        
      }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function getAssetRebalancingData(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255',
            'goalid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
      $getAssetData = $this->assetrebalancing->getAssetRebalancingData($request['goalid']);
      $data = array();
      foreach($getAssetData as $key => $value)
      {
         if($value['asset'] == "Equity")
         {
          $data1['asset'] = $value['asset'];
          $data1['asset_changed_value'] = $value['asset_changed_value'];
          $data1['asset_changed_percentage'] = $value['asset_changed_percentage'];
         $assetsfunds = $this->fundperformance->getGoalsSummaryListWithGoalIdAndAssetProducts($request['goalid'],$value['asset']);
          $prdtcnt = count($assetsfunds);
          // $data1['funds'] = $assetsfunds;
          $dataArr = array();
          foreach ($assetsfunds as $key1 => $value1) 
          {
            $data2['fundid'] = $value1['fundid'];
            $data2['fundname'] = $value1['fundname'];
            $data2['fundvalue'] = round($value['asset_changed_value']/$prdtcnt);
            if($value['status'] == "Added")
              $data2['status'] = "plus";
            else
              $data2['status'] = "minus";
            array_push($dataArr, $data2);
          }
          $data1['funds'] = $dataArr;
          array_push($data,$data1);
         }
         if($value['asset'] == "Debt")
         {
          $data1['asset'] = $value['asset'];
          $data1['asset_changed_value'] = $value['asset_changed_value'];
          $data1['asset_changed_percentage'] = $value['asset_changed_percentage'];
          $assetsfunds = $this->fundperformance->getGoalsSummaryListWithGoalIdAndAssetProducts($request['goalid'],$value['asset']);
          $prdtcnt = count($assetsfunds);
          // $data1['funds'] = $assetsfunds;
          $dataArr = array();
          foreach ($assetsfunds as $key1 => $value1) 
          {
            $data2['fundid'] = $value1['fundid'];
            $data2['fundname'] = $value1['fundname'];
            $data2['fundvalue'] = round($value['asset_changed_value']/$prdtcnt);
            if($value['status'] == "Added")
              $data2['status'] = "plus";
            else
              $data2['status'] = "minus";
            array_push($dataArr, $data2);
          }
          $data1['funds'] = $dataArr;
          array_push($data,$data1);
         }
         if($value['asset'] == "Liquid")
         {
          $data1['asset'] = $value['asset'];
          $data1['asset_changed_value'] = $value['asset_changed_value'];
          $data1['asset_changed_percentage'] = $value['asset_changed_percentage'];
          $assetsfunds = $this->fundperformance->getGoalsSummaryListWithGoalIdAndAssetProducts($request['goalid'],$value['asset']);
          $prdtcnt = count($assetsfunds);
          // $data1['funds'] = $assetsfunds;
          $dataArr = array();
          foreach ($assetsfunds as $key1 => $value1) 
          {
            $data2['fundid'] = $value1['fundid'];
            $data2['fundname'] = $value1['fundname'];
            $data2['fundvalue'] = round($value['asset_changed_value']/$prdtcnt);
            if($value['status'] == "Added")
              $data2['status'] = "plus";
            else
              $data2['status'] = "minus";
            array_push($dataArr, $data2);
          }
          $data1['funds'] = $dataArr;
          array_push($data,$data1);
         }
         if($value['asset'] == "Gold")
         {
          $data1['asset'] = $value['asset'];
          $data1['asset_changed_value'] = $value['asset_changed_value'];
          $data1['asset_changed_percentage'] = $value['asset_changed_percentage'];
           $assetsfunds = $this->fundperformance->getGoalsSummaryListWithGoalIdAndAssetProducts($request['goalid'],$value['asset']);
          $prdtcnt = count($assetsfunds);
          // $data1['funds'] = $assetsfunds;
          $dataArr = array();
          foreach ($assetsfunds as $key1 => $value1) 
          {
            $data2['fundid'] = $value1['fundid'];
            $data2['fundname'] = $value1['fundname'];
            $data2['fundvalue'] = round($value['asset_changed_value']/$prdtcnt);
            if($value['status'] == "Added")
              $data2['status'] = "plus";
            else
              $data2['status'] = "minus";
            array_push($dataArr, $data2);
          }
          $data1['funds'] = $dataArr;
          array_push($data,$data1);
         }
      }
      return response()->json([
              'status' => 'success',
              'Rebalancing' => $data
          ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function RedeemCheckOutSummary(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'fundid' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        //
    }
}
