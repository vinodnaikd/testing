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
class GoalController extends Controller
{
    public function __construct(
        Goal $goals,
        Customer $customer,
        RiskQuestions $riskprofile,
        FundPerformance $fundperformance,
        FundClass $fundclass
    )
    {
        $this->goals = $goals;
        $this->customer = $customer;
        $this->riskprofile = $riskprofile;
        $this->fundperformance = $fundperformance;
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
                    echo $reqData2['goalpriority'] = $goalListData[0]['goalpriority'];
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
        foreach ($assests as $key => $value) {
            $assval[$value['assettype']] = $value['assettype'];
           $assval[$value['assettype']] = "50%";
        }
        array_push($assestsArray,$assval);
       $goaldetails['goalname'] = $data['goalname'];
       $goaldetails['goalcost'] = $data['goalcost'];
       $goaldetails['futurecost'] = $data['futurecost'];
       $goaldetails['year'] = floor($data['timeframe']/12);
       $goaldetails['month'] = $data['timeframe']%12;
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
       return response()->json([
          "Savings_Summary" => $customerInvestAmntArr,
          "Risk_Score" => $customerRiskProfileScore,
          "Transaction_Log" => $customerTransLog
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
