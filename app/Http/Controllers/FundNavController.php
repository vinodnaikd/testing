<?php

namespace App\Http\Controllers;

use App\FundNav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FundNavController extends Controller
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
        $reqData = $request->all();
        
       $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
//        dd($va)
//        return $validator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FundNav  $fundNav
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        dd(12);
                 $data['navprice'] = "string";
		 $data['navdate'] = "string";
		 $data['maxentryload'] = "string";
		 $data['maxeditload'] = "string";
		 $data['52weekhigh'] = "string";
		 $data['52weeklow'] = "string";
		 $data['minimuminvestment'] = "string";
		 $data['minimumtopup'] = "string";
		 $data['sip'] = "string";
		 $data['stp'] = "string";
		 $data['sipdate'] = "string";
		 $data['fund_id'] = "string";
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundNav  $fundNav
     * @return \Illuminate\Http\Response
     */
    public function edit(FundNav $fundNav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundNav  $fundNav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundNav $fundNav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundNav  $fundNav
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundNav $fundNav)
    {
        //
    }
}
