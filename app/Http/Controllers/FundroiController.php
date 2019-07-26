<?php

namespace App\Http\Controllers;

use App\Fundroi;
use Illuminate\Http\Request;

class FundroiController extends Controller
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
     * @param  \App\Fundroi  $fundroi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
                 $data['standereddeviation'] = "string";
		 $data['beta'] = "string";
		 $data['alpha'] = "string";
		 $data['r-squared'] = "string";
		 $data['shapre'] = "string";
		 $data['portfolioturnover'] = "string";
                 $data['expanseratio'] = "string";
		 $data['fund_id'] = "string";
            return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fundroi  $fundroi
     * @return \Illuminate\Http\Response
     */
    public function edit(Fundroi $fundroi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fundroi  $fundroi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fundroi $fundroi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fundroi  $fundroi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundroi $fundroi)
    {
        //
    }
}
