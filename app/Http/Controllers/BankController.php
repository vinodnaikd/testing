<?php

namespace App\Http\Controllers;

use App\bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        //dd(1);
       $validator = Validator::make($request->all(), [
             'account_num' => 'required|string|max:100',
            'account_type' => 'required|string|max:100',
            'full_name' => 'required|string|max:100',
            'ifsc_code' => 'required|string|max:100',
            'micr_code' => 'required|string|max:100',
           'addressline1' => 'required|string|max:100',
            'addressline2' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:100',
            'bank_id' => 'required|string|max:100',
             ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
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
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string|max:100',
            'bank_id' => 'required|string|max:100',
             ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
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
    public function destroy(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'bank_id' => 'required|string|max:100',
             ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
    }
}
