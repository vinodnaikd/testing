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
        WealthAllocation $wealthallocation
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
             $reqData['customergoalid'] = "GL456-SSD5-DDDD-FDGJ-DDSF-KJSDDF35".mt_rand(10,100);
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
        $data = $this->goals->getGoalsList($getCustomerInfo['customerid']);
	   
	   return response()->json([
          "GoalsList" => $data
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

       foreach ($assests as $key => $value) {
          if($value['assettype'] == "Debt")
          {
            $assval1[$value['assettype']] = $value['assettype'];
           $assval1[$value['assettype']] = $assVal;
           $assval1[$value['assettype'].'_value'] = (($goaldetails['yearcommitment']*$assVal)/100);
           //Sip
           $assval22[$value['assettype']] = $value['assettype'];
           $assval22[$value['assettype']] = $assVal;
           $assval22[$value['assettype'].'_value'] = (($goaldetails['monthcommitment']*$assVal)/100);
           array_push($assestsArray,$assval1);
           array_push($assestsArray2,$assval22);
          }
            if($value['assettype'] == "Equity")
          {
            $assval2[$value['assettype']] = $value['assettype'];
           $assval2[$value['assettype']] = $assVal;
           $assval2[$value['assettype'].'_value'] = (($goaldetails['yearcommitment']*$assVal)/100);
           //Sip
           $assval23[$value['assettype']] = $value['assettype'];
           $assval23[$value['assettype']] = $assVal;
           $assval23[$value['assettype'].'_value'] = (($goaldetails['monthcommitment']*$assVal)/100);
           array_push($assestsArray,$assval2);
           array_push($assestsArray2,$assval23);
          }
          if($value['assettype'] == "Liquid")
          {
            $assval3[$value['assettype']] = $value['assettype'];
           $assval3[$value['assettype']] = $assVal;
           $assval3[$value['assettype'].'_value'] = (($goaldetails['yearcommitment']*$assVal)/100);
           //Sip
           $assval24[$value['assettype']] = $value['assettype'];
           $assval24[$value['assettype']] = $assVal;
           $assval24[$value['assettype'].'_value'] = (($goaldetails['monthcommitment']*$assVal)/100);
           array_push($assestsArray,$assval3);
           array_push($assestsArray2,$assval24);
          }
          if($value['assettype'] == "Gold")
          {
            $assval4[$value['assettype']] = $value['assettype'];
           $assval4[$value['assettype']] = $assVal;
           $assval4[$value['assettype'].'_value'] = (($goaldetails['yearcommitment']*$assVal)/100);
           //Sip
           $assval25[$value['assettype']] = $value['assettype'];
           $assval25[$value['assettype']] = $assVal;
           $assval25[$value['assettype'].'_value'] = (($goaldetails['monthcommitment']*$assVal)/100);
           array_push($assestsArray,$assval4);
           array_push($assestsArray2,$assval25);
          }

        }

       $goaldetails['growth'] = $growth;
       $goaldetails['bargrowth'] = $bargrowth;

       $goaldetails['Lumpsum'] = $assestsArray;
       $goaldetails['Sip'] = $assestsArray2;
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
        $savingsArray = array();
        //if($customerInvestAmnt['purchase1'])
        foreach ($customerInvestAmnt['purchase1'] as $key => $value) {
            $currentSavings = $value['units'] * $value['nav'];
            array_push($savingsArray, $currentSavings);
        }
        if(!empty($value))
        $customerInvestAmntArr['start_date'] = $value['startdate'];
        $customerInvestAmntArr['purchase'] = $customerInvestAmnt['purchase'];
        $customerInvestAmntArr['purchasesavings'] = $customerInvestAmnt['purchase']+array_sum($savingsArray);
        $customerRiskProfileScore = $this->riskprofile->getCustomerRiskProfileScore($getCustomerInfo['customerid']);
        $customerTransLog = $this->fundperformance->getCustomerPostTransLogs($getCustomerInfo['customerid']);
        
       // dd($customerTransLog);
        //Goals
        $customerGoals = $this->fundperformance->getCustomerGoals($getCustomerInfo['customerid']);
        //dd($customerGoals);
       return response()->json([
          "Savings_Summary" => $customerInvestAmntArr,
          "Risk_Score" => $customerRiskProfileScore,
          "Transaction_Log" => $customerTransLog,
          "Goals" => $customerGoals
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
       $newArr = array();
       $totInv = array_sum(array_column($assetsData, 'TotalInvestmentValue'));
       $totCur = array_sum(array_column($assetsData, 'TotalCurrentValue'));
       //dd($totInv);
       $growth = (($totCur-$totInv)/$totInv);
       $bargrowth = ($totCur/$customerGoalsDetails['futurecost']);
       $customerGoalsDetails['growth'] = $growth;
       $customerGoalsDetails['bargrowth'] = $bargrowth;
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
       foreach ($assetsData as $key => $value) {
        $d = array(['TotalInvestmentValue'.':'.$value['TotalInvestmentValue']],['TotalCurrentValue'.':'.$value['TotalCurrentValue']],['AssetType'.':'.$value['AssetType']],['Growth'.':'.$value['Growth']]);
        array_push($newArr, $d);
        // array_push($newArr, $v1);
       }
      // return $newArr;
        $customerGoalsDetails['goalsAssests'] = $newArr;
        $customerGoalsDetails['goalsAllocatedFunds'] = $this->fundperformance->getGoalsSummaryFundsListWithGoalId($request['goalid']);
       return response()->json([
          "GoalsSummaryDetails" => $customerGoalsDetails
        ], 200);
    }

    public function goalsAssestsAllocation(Request $request)
    {
        $allocationData = $request->json()->all();
        foreach ($allocationData as $key => $value) {
            
       $validator = Validator::make($value, [
            'goalid' => 'required|string|max:255',
            'userid' => 'required|string|max:255',
            'asset' => 'required|string|max:255',
            'asset_value' => 'required|string|max:255',
            'purchase_type' => 'required|string|max:255',
            'lum_sip'=> 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
        $reqData['goalid'] = $value['goalid'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['asset'] = $value['asset'];
        $reqData['asset_value'] = $value['asset_value'];
        $reqData['purchase_type'] = $value['purchase_type'];
        $reqData['lumpsum_sip'] = $value['lum_sip'];
        if($reqData['purchase_type'] == "S")
        {
        $reqData['start_date'] = $value['start_date'];
        $reqData['end_date'] = $value['end_date'];
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
           array_push($goalsLumSumm, $goalsdet1);
        }
        else
        {
          $goals['sip_amount'] = $value['lumpsum_sip'];
          $goalsdet['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet['asset'] = $value['asset'];
           $goalsdet['asset_value'] = $value['asset_value'];
           array_push($goalsSipSumm, $goalsdet);
        }
           
       }
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
        $goalwealth = array();
        foreach ($customerGoals as $key => $value) {
           $gw['goalname'] = $value['goalname'];
           $gw['goalid'] = $value['customergoalId'];
           $gw['futurecost'] = $value['futurecost'];
           $gw['totalcurrentvalue'] = $value['totalcurrentvalue'];
           $gw['goalpriority'] = $value['goalpriority'];
           $gw['year'] = floor($value['timeframe']/12);
           $gw['month'] = $value['timeframe']%12;
           $gw['sipamount'] = $value['sipamount'];
           $gw['lumpsumamount'] = $value['lumpsumamount'];
           array_push($goalwealth, $gw);
        }
       return response()->json([
          "Goals" => $goalwealth
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
       /* $GoalsData = $this->fundroi->getAddedFunds($getCustomerInfo['customerid'],$);*/
        
        $goalwealth = array();
        foreach ($customerGoals as $key => $value) {
           $gw['goalname'] = $value['goalname'];
           $gw['goalid'] = $value['customergoalId'];
           $gw['futurecost'] = $value['futurecost'];
           $gw['totalcurrentvalue'] = $value['totalcurrentvalue'];
           $gw['goalpriority'] = $value['goalpriority'];
           $gw['year'] = floor($value['timeframe']/12);
           $gw['month'] = $value['timeframe']%12;
           $gw['sipamount'] = $value['sipamount'];
           $gw['lumpsumamount'] = $value['lumpsumamount'];
           array_push($goalwealth, $gw);
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
       // dd($customerGoals);
       $goalsFunds = array();
       foreach($customerGoals as $gkey =>$gvalue)
       {
        $goals['goalname'] = $gvalue['goalname'];
           $goals['goalid'] = $gvalue['customergoalId'];
           $goals['futurecost'] = $gvalue['futurecost'];
           $goals['totalcurrentvalue'] = $gvalue['totalcurrentvalue'];
           $goals['goalpriority'] = $gvalue['goalpriority'];
           $goals['year'] = floor($gvalue['timeframe']/12);
           $goals['month'] = $gvalue['timeframe']%12;
    $customerGoalsAssets = $this->fundperformance->getCustomerGoalsFundsAssets($getCustomerInfo['customerid'],$gvalue['customergoalId']);
      $fundAssets = array();
      foreach($customerGoalsAssets as $key =>$value)
      {
         $assests['assettype'] = $value['assettype'];
         $fundclassData = $this->fundperformance->getUserGoalsSummaryFundsListWithGoalId($getCustomerInfo['customerid'],$gvalue['customergoalId'],$value['assettype']);
         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['assettype'] = $value1['assettype'];
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getCustomerGoalsFundProducts($getCustomerInfo['customerid'],$gvalue['customergoalId'],$value1['fundclassid']);
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
              $products['units'] = $value2['units'];
              $products['purchasevalue'] = $value2['purchasevalue'];
              $products['currentvalue'] = $value2['currentvalue'];
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
return response()->json([
              'funds' => $goalsFundsArr
          ], 200);
      
    }

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
         if($wealthData)
         {
         $wealthAllocateData = $this->fundperformance->getCustomerWealthAllocate($getCustomerInfo['customerid'],$wealthData[0]['cust_wel_all']);
         // dd($wealthAllocateData);
       $wealthAllocateData['wealthid'] = $wealthData[0]['cust_wel_all'];
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
            if($value2['purchasetype'] == "L")
              {
                $fundredemData1 = $this->fundroi->getFundLumpsumRedemption($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalId']);
                // dd($fundredemData1);
                if(!empty($fundredemData1['amount']))
                $redmvalue1 = $value2['purchasevalue']-$fundredemData1['amount'];
            else
                $redmvalue1 = 0;

                    $fundproducts1['fundid'] = $value2['fundid'];
                    $fundproducts1['fundname'] = $value2['fundname'];
                    $fundproducts1['purchasetype'] = $value2['purchasetype'];
                    $fundproducts1['units'] = $value2['units'];
                    $fundproducts1['purchasevalue'] = $value2['purchasevalue'];
                    $fundproducts1['currentvalue'] = $value2['currentvalue'];
                    $fundproducts1['fundredamount'] = $redmvalue1;
                    $fundproducts1['balamount'] = $value2['purchasevalue']-$redmvalue1;
                array_push($lumProductsArray, $fundproducts1);
/*                $reqData['lumpsumamount'] = $fundvalue;
                $reqData1['fundid'] = $value2['fundid'];
                $reqData1['goalid'] = $request['goalid'];
                $reqData1['purchasetype'] = $value2['purchasetype'];
                $reqData1['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['lumpsumamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData,$reqData1);*/
              }
              else
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
                    array_push($sipProductsArray, $fundproducts2);
                /*$reqData2['sipamount'] = $fundvalue;
                $reqData3['fundid'] = $value2['fundid'];
                $reqData3['goalid'] = $request['goalid'];
                $reqData3['purchasetype'] = $value2['purchasetype'];
                $reqData3['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['sipamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData2,$reqData3);*/
              }
              $fundproductsArr['Lumpsum'] = $lumProductsArray;
                      $fundproductsArr['Sip'] = $sipProductsArray;
         }
              $goals['fundproducts'] = $fundproductsArr;
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
      $reqData['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF88675".mt_rand(10,10000);
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
       foreach($fundredem as $gkey =>$gvalue)
       {
        //$goals['goalname'] = $gvalue['goalname'];
           //$goals['goalid'] = $gvalue['customergoalid'];
            $fundProducts = array();
           $fundprodcutsData = $this->fundperformance->getCustomerRedeemFundProducts($getCustomerInfo['customerid'],$gvalue['customergoalid']);
           // dd($fundprodcutsData);
           $lumProductsArray = array();
            $sipProductsArray = array();
         foreach($fundprodcutsData as $key2 => $value2)
         {          
            if($value2['purchasetype'] == "L")
              {
                $fundredemData1 = $this->fundroi->getFundLumpsumRedemption($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalid']);
                // dd($fundredemData1);
                if(!empty($fundredemData1['amount']))
                $redmvalue1 = $fundredemData1['amount'];
            else
                $redmvalue1 = 0;

                    $fundproducts1['fundid'] = $value2['fundid'];
                    $fundproducts1['fundname'] = $value2['fundname'];
                    $fundproducts1['purchasetype'] = $value2['purchasetype'];
                   /* $fundproducts1['units'] = $value2['units'];
                    $fundproducts1['purchasevalue'] = $value2['purchasevalue'];
                    $fundproducts1['currentvalue'] = $value2['currentvalue'];*/
                    $fundproducts1['existingamount'] = $value2['purchasevalue'];
                    $fundproducts1['amounttoredeem'] = $redmvalue1;
                    $fundproducts1['balanceamount'] = $value2['purchasevalue']-$redmvalue1;
                array_push($lumProductsArray, $fundproducts1);
              }
              else
              {
            $fundredemData = $this->fundroi->getFundSipRedemption($getCustomerInfo['customerid'],$value2['fundid'],$gvalue['customergoalid']);
            if(!empty($fundredemData['amount']))
                $redmvalue = $fundredemData['amount'];
            else
                $redmvalue = 0;

                    $fundproducts2['fundid'] = $value2['fundid'];
                    $fundproducts2['fundname'] = $value2['fundname'];
                    $fundproducts2['purchasetype'] = $value2['purchasetype'];
                    /*$fundproducts2['sipamount'] = $value2['sipamount'];
                    $fundproducts2['purchasevalue'] = $value2['purchasevalue'];
                    $fundproducts2['currentvalue'] = $value2['currentvalue'];
                    $fundproducts2['units'] = $value2['units'];
                    $fundproducts2['fundredamount'] = $redmvalue;*/
                    $fundproducts2['existingamount'] = $value2['purchasevalue'];
                    $fundproducts2['amounttoredeem'] = $redmvalue;
                    $fundproducts2['balanceamount'] = $value2['purchasevalue']-$redmvalue;
                    array_push($lumProductsArray, $fundproducts2);
              }
              $fundproductsArr['Lumpsum'] = $lumProductsArray;
                      $fundproductsArr['Sip'] = $sipProductsArray;
         }
             // $goals['fundproducts'] = $lumProductsArray;
            
         }
         $totalinstantredeem = array_sum(array_column($lumProductsArray, 'amounttoredeem'));
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
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid']);
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
            $reqData['sipamount'] = $request['amount'];
            $reqData['customerorderid'] = $fundSipData['customerorderid'];
            $reqData['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF88675".mt_rand(10,10000);
            $fundDetailsUpd = $this->fundroi->InsertCustomerFundRedemption($reqData);
            if($fundDetailsUpd)
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
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid']);
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
        $fundSipData = $this->fundroi->checkSipModified($getCustomerInfo['customerid']);
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
         $datas = array();
         $datasArray = array();
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
       
        if($goalsAssests)
        {
        $data['userid'] = $value['userid'];
        $data['goalname'] = $goalsAssests[0]['goalname'];
        $assdata = array();
      foreach ($goalsAssests as $key1 => $value1) {
        if($value1['asset'] == "Equity")
        $data1['Equity'] = $value1['asset_value'];
        if($value1['asset'] == "Debt")
        $data1['Debt'] = $value1['asset_value'];
        if($value1['asset'] == "Liquid")
        $data1['Liquid'] = $value1['asset_value'];
        if($value1['asset'] == "Gold")
        $data1['Gold'] = $value1['asset_value'];
      
      }
      array_push($datas,$data1);
      $data['Assets'] = $datas;
    }
    // $datasArray['Rebalancing'] = $data;
    return response()->json([
              'status' => 'success',
              'Rebalancing' => $data,
            //'Our Recommendation'=> $data3
          ],200);
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
        }
        
    }

     public function getProductSelection(Request $request)
    {
     $data = "1";
      $data1 = "1st Goal Product Selection";
      $data2 = array(array(
        'Equity' => "3(40%)INR 4,00,000'",
        'Debt' => "Debt(30%)INR 3,00,000",
        'Gold' => "Gold(10%)INR 1,00,000",
        'Liquid' => "Liquid(20%)INR 2,00,000",
    ));//
$data3 = "AMOUNT(₹)";
       $data4 = array(array(
         'Franklin prima plus Fund' => "+50,000",
         'DSP Blackrock Income Opp Fund' => "+1,00,000",
         'HDFC Gold Fund' => "-50,000",
         'Franklin USB Fund' => "-50,000",
          'HDFC Cash Management Fund' => "+50,000",
          'DSP Equity Fund' => "+1,00,000",
     ));//
     $data5 = array(array(
       'DSP Equity Fund' => "+1,00,000",
   ));//
     return response()->json(array([
           'status' => 'success',
           'user id' => $data,
           'goals' => $data1,
           'goals' => $data2,
           'scenarioonrproduct'=> $data3,
           'scenarioonrproduct'=> $data4,
          'AmountforRebalancing: INR 10,00,000'=> $data5
       ],200));
   }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        //
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
