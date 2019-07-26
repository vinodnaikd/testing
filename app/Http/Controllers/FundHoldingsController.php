<?php

namespace App\Http\Controllers;

use App\FundHoldings;
use Illuminate\Http\Request;

class FundHoldingsController extends Controller
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
     * @param  \App\FundHoldings  $fundHoldings
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request)
   {
     $data['holdingid'] = "string";
     $data['holdingname'] = "string";
     $data['fund_id'] = "string";
    return response()->json($data, 200);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundHoldings  $fundHoldings
     * @return \Illuminate\Http\Response
     */
    public function edit(FundHoldings $fundHoldings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundHoldings  $fundHoldings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundHoldings $fundHoldings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundHoldings  $fundHoldings
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundHoldings $fundHoldings)
    {
        //
    }
}
