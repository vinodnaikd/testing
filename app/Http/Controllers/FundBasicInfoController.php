<?php

namespace App\Http\Controllers;

use App\FundBasicInfo;
use Illuminate\Http\Request;

class FundBasicInfoController extends Controller
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
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
   {
     $data['fundname'] = "string";
     $data['Schemename'] = "string";
     $data['category'] = "string";
     $data['fundmanager'] = "string";
     $data['net_aum'] = "string";
     $data['returndetails'] = "string";
     $data['fund_id'] = "string";
    return response()->json($data);
    }
    
//     public function getFundsBasicInfo(Request $request)
//    {
//         $validator = Validator::make($request->all(), [
//            'category_id' => 'required|string|max:255|unique:users',
//             'subcategory_id' => 'required|string|max:255|unique:users',
//             'fundhouse_id' => 'required|string|max:255|unique:users',
//        ]);
//        if($validator->fails()) {
//            return response()->json([
//                'status' => 'error',
//                'messages' => $validator->messages()
//            ], 200);
//        }
//        
//       $data['category_name'] ="string";
//       $data['categoryname_id']="String";	
//        return response()->json($data);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(FundBasicInfo $fundBasicInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundBasicInfo $fundBasicInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundBasicInfo $fundBasicInfo)
    {
        //
    }
}
