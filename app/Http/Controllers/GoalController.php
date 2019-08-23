<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Customer;
class GoalController extends Controller
{
    public function __construct(
        Goal $goals,
        Customer $customer
    )
    {
        $this->goals = $goals;
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
        $validator = Validator::make($request->json()->all(), [
            'goal_name' => 'required|string|max:255',
            'cost_goal' => 'required|string|max:255',
            'time_frame' => 'required|string|max:255',
            'customerid' => 'required|string|max:255',
            'future_cost' => 'required|string|max:255',
            //'goalpriority' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['customerid'] = $request['customerid'];
        $reqData['goalname'] = $request['goal_name'];
        $reqData['goalcost'] = $request['cost_goal'];
        $reqData['timeframe'] = $request['time_frame'];
        $reqData['futurecost'] = $request['future_cost'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $goalData = $this->goals->InsertCustomerGoals($reqData);
        if($goalData)
        {
            return response()->json([
              'status' => 'Goal Added Successfully',
              //'goal_info' => $goalData
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
