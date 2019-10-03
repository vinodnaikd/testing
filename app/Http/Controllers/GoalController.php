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
        Fundroi $fundroi
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
        if($request['customergoalid'])
        {
            $goalListData = $this->goals->getGoals($request['customergoalid']);

            if($goalListData[0]['goalpriority'] == $request['goalpriority'])
            {

                $reqData1['goalpriority'] = $reqData['goalpriority'];
                 $goalData = $this->goals->UpdateCustomerGoals($request['customergoalid'],$reqData1);
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
        $assVal = 100/count($assests);
        foreach ($assests as $key => $value) {
            $assval[$value['assettype']] = $value['assettype'];
           $assval[$value['assettype']] = $assVal;
        }
        array_push($assestsArray,$assval);
       $goaldetails['goalname'] = $data['goalname'];
       $goaldetails['goalpriority'] = $data['goalpriority'];
       $goaldetails['goalcost'] = $data['goalcost'];
       $goaldetails['futurecost'] = $data['futurecost'];
       $goaldetails['year'] = ($data['futurecost']/$data['timeframe']);
       $goaldetails['month'] = round($goaldetails['year']/12);
       $goaldetails['Lumpsum'] = $assestsArray;
       $goaldetails['Sip'] = $assestsArray;
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
       $assetsData = $this->fundperformance->getGoalsSummaryGraphListWithGoalId($request['goalid']);
       $newArr = array();
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
       $goals['lumpsum_sip'] = $customerGoalsDetails[0]['lumpsum_sip'];
       $goals['goalid'] = $customerGoalsDetails[0]['goalid'];
       $goals['purchase_type'] = $customerGoalsDetails[0]['purchase_type'];
       $goals['customerid'] = $customerGoalsDetails[0]['customerid'];
    }
    else
    {
       $goals['lumpsum_sip'] = "";
       $goals['goalid'] = "";
       $goals['purchase_type'] = "";
       $goals['customerid'] = "";
    }
       
       $goalsSumm = array();
       foreach ($customerGoalsDetails as $key => $value) {
           $goalsdet['goal_ass_id'] = $value['goal_ass_id'];
           $goalsdet['asset'] = $value['asset'];
           $goalsdet['asset_value'] = $value['asset_value'];
           array_push($goalsSumm, $goalsdet);
       }
       $goals['GoalsSummaryDetails'] = $goalsSumm;
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
