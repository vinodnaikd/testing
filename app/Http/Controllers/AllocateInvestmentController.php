<?php

namespace App\Http\Controllers;

use App\AllocateInvestment;
use Illuminate\Http\Request;

class AllocateInvestmentController extends Controller
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
     * @param  \App\AllocateInvestment  $allocateInvestment
     * @return \Illuminate\Http\Response
     */
   
 public function show(Request $request)
        {
          $data['purchase value INR'] = "string";
          $data['current value INR'] = "string";
          $data['goal future value INR'] = "string";
          $data['goal_name'] = "string";
          $data['time_period'] = "string";
          $data['time_period']  = "string";
          $data['select allocation mode for this model'] = (object)array(
              'lumpsum' => "true",
              'Sip' => "true",
          );
        
        return response()->json( $data,      
        200);
      }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllocateInvestment  $allocateInvestment
     * @return \Illuminate\Http\Response
     */
    public function edit(AllocateInvestment $allocateInvestment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllocateInvestment  $allocateInvestment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllocateInvestment $allocateInvestment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllocateInvestment  $allocateInvestment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllocateInvestment $allocateInvestment)
    {
        //
    }
}
