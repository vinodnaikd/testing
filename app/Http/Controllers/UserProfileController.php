<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
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
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }

    public function signIn(Request $request)
    {
//        dd(113);
        $data['firstname'] = "vinod";
        $data['lastname'] = "naik";
        $data['dob'] = "10-04-1992";
        $data['email'] = "vinod@gmail.com";
        $data['customer_id'] = "1";
        $data['agent_id'] = "1";
        $data['salutation_name']= "kp";
        $data['mobile_number'] = "1231312233";
        $data['country_birth'] = "India";
        $data['residential_status'] = "";
        $data['marital_status'] = "unmarried";
        $data['occupation'] = "software Developer";
        $data['pan_number'] = "Ind12345";
        $data['income_group'] = "";
        $data['political_affiliations'] = "";
        $data['userprofile_id'] = "";
        $data['user_status'] = "";
        
         return response()->json($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['firstname'] = "vinod";
        $data['lastname'] = "naik";
        $data['dob'] = "10-04-1992";
        $data['email'] = "vinod@gmail.com";
        $data['customer_id'] = "1";
        $data['agent_id'] = "1";
        $data['salutation_name']= "kp";
        $data['mobile_number'] = "1231312233";
        $data['country_birth'] = "India";
        $data['residential_status'] = "";
        $data['marital_status'] = "unmarried";
        $data['occupation'] = "software Developer";
        $data['pan_number'] = "Ind12345";
        $data['income_group'] = "";
        $data['political_affiliations'] = "";
        $data['userprofile_id'] = "";
        $data['user_status'] = "";
        
        $data1['addressline1'] = "string";
        $data1['addressline2'] = "string";
        $data1['city'] = "string";
        $data1['country'] = "string";
        $data1['state'] = "string";
        $data1['pincode'] = "string";
        $data1['address_id'] = "string";
        
        $data2['addressline1'] = "string";
        $data2['addressline2'] = "string";
        $data2['city'] = "string";
        $data2['country'] = "string";
        $data2['state'] = "string";
        $data2['pincode'] = "string";
        $data2['address_id'] = "string";
        
        $data3['Name'] = "string";
        $data3['guardian_name'] = "string";
        $data3['relationship'] = "string";
        $data3['nominee_address'] = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        $data3['nominee_dob'] = "string";
        $data3['nominee_share'] = "string";
        $data3['nominee_id'] = "string";
        
        $data4['Name'] = "string";
        $data4['guardian_name'] = "string";
        $data4['relationship'] = "string";
        $data4['nominee_address'] = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        $data4['nominee_dob'] = "string";
        $data4['nominee_share'] = "string";
        $data4['nominee_id'] = "string";
        
        $data5['account_num'] = "string";
        $data5['account_type'] = "string";
        $data5['full_name'] = "string";
        $data5['ifsc_code'] = "string";
        $data5['micr_code'] = "string";
        $data5['adress'] = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        $data5['bank_id'] = "string";
        
      return response()->json([
            'status' => 'success',
            'userprofile' => $data,
            'correspondence_address' => $data1,
            'permanent_address' => $data2,
            'nominee1' => $data3,
            'nominee2' => $data4,
            'bank' => $data5
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,UserProfile $userProfile)
    {
        $data['firstname'] = "vinod";
        $data['lastname'] = "naik";
        $data['dob'] = "10-04-1992";
        $data['email'] = "vinod@gmail.com";
        $data['customer_id'] = "1";
        $data['agent_id'] = "1";
        $data['salutation_name']= "kp";
        $data['mobile_number'] = "1231312233";
        $data['country_birth'] = "India";
        $data['residential_status'] = "";
        $data['marital_status'] = "unmarried";
        $data['occupation'] = "software Developer";
        $data['pan_number'] = "Ind12345";
        $data['income_group'] = "";
        $data['political_affiliations'] = "";
        $data['userprofile_id'] = "";
        $data['user_status'] = "";
        
         return response()->json($data);
    }

     public function changeAddress(Request $request)
    {
        $data = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        
         return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
