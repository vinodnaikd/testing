<?php

namespace App\Http\Controllers;

use App\RiskDashboardRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiskDashboardRecordController extends Controller
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
     * @param  \App\RiskDashboardRecord  $riskDashboardRecord
     * @return \Illuminate\Http\Response
     */
    public function show(RiskDashboardRecord $riskDashboardRecord)
    {
        //
    }
    
    public function getRiskDashboardRecords(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:100',
             ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RiskDashboardRecord  $riskDashboardRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(RiskDashboardRecord $riskDashboardRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RiskDashboardRecord  $riskDashboardRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiskDashboardRecord $riskDashboardRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiskDashboardRecord  $riskDashboardRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiskDashboardRecord $riskDashboardRecord)
    {
        //
    }
}
