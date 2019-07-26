<?php

namespace App\Http\Controllers;

use App\Nominee;
use Illuminate\Http\Request;

class NomineeController extends Controller
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
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
                   $data['Name'] ="test";
		   $data['guardian_name'] ="test";
		   $data['relationship'] ="test";
		   $data1['nominee_address'] =(object)Array(
		    "addressline1" => "string",
			"addressline2" => "string",
			"city" => "string",
			"country" => "string",
			"state" => "string",
			"pincode" => "string",
			"address_id" => "string"
				   
		   );
		  $data['nominee_dob'] = "string";
		  $data['nominee_share'] = "string";
		  $data['nominee_id'] = "string";
                  $data_com = array_merge($data1,$data);
		  return response()->json([$data_com], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominee $nominee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        //
    }
}
