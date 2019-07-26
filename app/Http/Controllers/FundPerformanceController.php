<?php

namespace App\Http\Controllers;

use App\FundPerformance;
use Illuminate\Http\Request;

class FundPerformanceController extends Controller
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
     * @param  \App\FundPerformance  $fundPerformance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
                 $data['ytd'] = "string";
		 $data['6months'] = "string";
		 $data['1year'] = "string";
		 $data['3year'] = "string";
		 $data['fund_id'] = "string";


return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundPerformance  $fundPerformance
     * @return \Illuminate\Http\Response
     */
    public function edit(FundPerformance $fundPerformance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundPerformance  $fundPerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundPerformance $fundPerformance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundPerformance  $fundPerformance
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundPerformance $fundPerformance)
    {
        //
    }
}
