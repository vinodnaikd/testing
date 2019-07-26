<?php

namespace App\Http\Controllers;

use App\bank;
use Illuminate\Http\Request;

class BankController extends Controller
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
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
            $data['account_num'] = "string";
            $data['account_type'] = "string";
            $data['full_name'] = "string";
            $data['ifsc_code'] = "string";
            $data['micr_code'] = "string";
            $data1['address'] = (object)Array(

                     "addressline1" => "string",
                      "addressline2" => "string",
                      "city" => "string",
                      "country" => "string",
                      "state" => "string",
                      "pincode" => "string",
                      "address_id" => "string"

            );

	$data['bank_id'] ="string";
        $dd = array_merge($data1,$data);
		return response()->json([$dd],200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(bank $bank)
    {
        //
    }
}
