<?php

namespace App\Http\Controllers;

use App\Models\SurplusCalculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class SurplusCalculationController extends Controller
{
    public function __construct(SurplusCalculation $surpluscalculation,Customer $customer)
    {
        $this->surpluscalculation = $surpluscalculation;
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
        // dd($request->json()->all());
        $validator = Validator::make($request->json()->all(), [
            'yearly_income' => 'required|string|max:255',
            'yearly_expenses' => 'required|string|max:255',
            'total_surplus' => 'required|string|max:255',
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $reqData['yearly_income'] = $request['yearly_income'];
        $reqData['yearly_expenses'] = $request['yearly_expenses'];
        $reqData['total_surplus'] = $request['total_surplus'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        if($request['surplussetting_id'])
        {
           $surpluscalculationData = $this->surpluscalculation->UpdateCustomerSurplusCalculation($request['surplussetting_id'],$reqData);
           $surplusId = $request['surplussetting_id'];
           $status = "Updated Successfully"; 
        }
        else
        {
           $surpluscalculationData = $this->surpluscalculation->InsertCustomerSurplusCalculation($reqData); 
           $surplusId = $surpluscalculationData;
           $status = "Added Successfully";
        }
        if($surplusId)
        {
           $surplusData = $this->surpluscalculation->getCustomerSurplusCalculation($surplusId);
           return response()->json([
                'status' => $status,
                'surpluscalculation' => $surplusData
            ], 200);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurplusCalculation  $surplusCalculation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        if($getCustomerInfo)
        {
            $surplusData = $this->surpluscalculation->getCustomerSurplusCalculationDetails($getCustomerInfo['customerid']);
           return response()->json([
                'status' => "success",
                'surpluscalculationdetails' => $surplusData
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurplusCalculation  $surplusCalculation
     * @return \Illuminate\Http\Response
     */
    public function edit(SurplusCalculation $surplusCalculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurplusCalculation  $surplusCalculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurplusCalculation $surplusCalculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurplusCalculation  $surplusCalculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurplusCalculation $surplusCalculation)
    {
        //
    }
}
