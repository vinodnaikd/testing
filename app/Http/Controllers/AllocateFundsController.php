<?php

namespace App\Http\Controllers;

use App\AllocateFunds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AllocateFundsController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AllocateFunds  $allocateFunds
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
        {
//          dd(121);
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
       
           // dd($dd);
          $data  = (object)array(
              'firstname' => "string",
              'lastname' => "string",
              'dob' => "string",
              'email' => "string",
              'customer_id' => "string",
              'agent_id' => "string",
              'salutation_name' => "string",
              'mobile_number' => 0,
              'county_birth' =>"string",
              'residential_status' => "string",
              'marital_status' => "string",
              'occupation' => "string",
              'pan_number' =>"string",
              'income_group' => "string",
              'political_affiliations' => "string",
              'userprofile_id' => "string",
            'user_status' => "string"
          );
            $data1  = (object)array(
              'equityfund' => "string",
              'follo_start_date' => "string",
              'number_of_units' => "string",
              'purchsae value INR' => "string",
              'current amount INR' => "string",
              'monthly sip INR' => "string"
          );
            $data2  = (object)array(
              'debut_funds' => "string",
              'date of investment' => "string",
              'number of units' => "string",
              'purchase value INR' => "string",
              'current amount INR' => "string"
                );
                $data3['goal_name'] = "string";
                $data3['total_amount'] = "string";
                $data3['date_time'] = "string";
                
               $dd = array(
              'status' => 'success',
              'user_id' => $data,
              'equity_funds' => $data1,
              'debut_funds' => $data2,
              'goal_name'=> "string",
              'total_amount'=> "string",
              'goal_name'=> "string",
                );    
               
                 return response()->json($dd, 200);
      }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllocateFunds  $allocateFunds
     * @return \Illuminate\Http\Response
     */
    public function edit(AllocateFunds $allocateFunds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllocateFunds  $allocateFunds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllocateFunds $allocateFunds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllocateFunds  $allocateFunds
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllocateFunds $allocateFunds)
    {
        //
    }
}
