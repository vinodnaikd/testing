<?php

namespace App\Http\Controllers;

use App\DashboardRecords;
use Illuminate\Http\Request;

class DashboardRecordsController extends Controller
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
     * @param  \App\DashboardRecords  $dashboardRecords
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
     $data['risk_score'] = "string";
     $data['risk_category_ranks'] = "string";
     $data['risk_category_grades'] = "string";
    return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DashboardRecords  $dashboardRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(DashboardRecords $dashboardRecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DashboardRecords  $dashboardRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashboardRecords $dashboardRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DashboardRecords  $dashboardRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashboardRecords $dashboardRecords)
    {
        //
    }
}
