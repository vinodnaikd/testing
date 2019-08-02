<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\CustomerDetails;
use App\Models\Nominee;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Carbon\Carbon;

class UserProfileController extends Controller
{
     public function __construct(
        UserProfile $usersprofile,
        Customer $customer,
        CustomerDetails $customerdetails,
        Bank $customerbank,
        Nominee $customernominee,
        CustomerAddress $customeraddress
    )
    {
        $this->usersprofile = $usersprofile;
        $this->customer = $customer;
        $this->customerdetails = $customerdetails;
        $this->customerbank = $customerbank;
        $this->customernominee = $customernominee;
        $this->customeraddress = $customeraddress;
    }
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
    public function signUp(Request $request)
    {
        //$reqData = $request->all();
        $validator = Validator::make($request->all(), [
          'first_name' => 'required|string|max:100',
          'last_name' => 'required|string|max:100',
          'email' => 'required|email|max:255',
          'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
          'password_confirmation' => 'min:6',
          'mobile_number' => 'required|string|max:100',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }

      $reqData['username'] = $request['first_name'].$request['last_name'];
      $reqData['email'] = $request['email'];
      $reqData['password'] = $request['password'];
      $reqData['mobileno'] = $request['mobile_number'];
      $reqData['applicationid'] = 1;
      $reqData['createdutcdatetime'] = Carbon::now();
      $reqData['modifiedutcdatetime'] = Carbon::now();
      $checkDuplicateEmail=$this->usersprofile->checkDuplicateMailExists($reqData['email']);
        if(count($checkDuplicateEmail)>0){
           $data['error']="Duplicate. Email already Exists";
           return $data;
           //flashy()->error('Duplicate Email Exists');
        }else{
     $signUpData = $this->usersprofile->InsertUser($reqData);
     if($signUpData)
     {
         $reqData1['email'] = $request['email'];
         $reqData1['mobile'] = $request['mobile_number'];
         $reqData1['advisorid'] = 1;
         $reqData1['accountmanagerid'] = 1;
         $reqData1['userid'] = $signUpData;
         $reqData1['createdutcdatetime'] = Carbon::now();
         $reqData1['modifiedutcdatetime'] = Carbon::now();
         $customerData = $this->customer->InsertCustomer($reqData1);
     }
     $data['success']="User Created Successfully";
        }
     
            return $data;
    }
    public function Register(Request $request)
    {
//      dd($request->all());
      if($request['action'] == "customer")
          {
          $validator = Validator::make($request->all(), [
          'email' => 'required|email|max:255',
          'mobile_number' => 'required|string|max:100',
          'userid' => 'required|string|max:100',
          'advisorid' => 'required|string|max:100',
          'accountmanagerid' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['email'] = $request['email'];
        $reqData['mobile'] = $request['mobile_number'];
        $reqData['userid'] = $request['userid'];
        $reqData['advisorid'] = $request['advisorid'];
        $reqData['accountmanagerid'] = $request['accountmanagerid'];;
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
     $checkDuplicateEmail=$this->customer->checkDuplicateMailExists($reqData['email']);
        if(count($checkDuplicateEmail)>0){
           $status['error']="Duplicate. Email already Exists";
           return $status;
           //flashy()->error('Duplicate Email Exists');
        }else{
     $customerData = $this->customer->InsertCustomer($reqData);
     $status['success']="Customer Created Successfully";
         return $status;
        }
          }
     elseif($request['action'] == "customerdetails")
          {
//         dd($request->all());
//         $data['firstname'] = "vinod";
//        $data['lastname'] = "naik";
//        $data['dob'] = "10-04-1992";
//        $data['email'] = "vinod@gmail.com";
//        $data['customer_id'] = "1";
//        $data['agent_id'] = "1";
//        $data['salutation_name']= "kp";
//        $data['mobile_number'] = "1231312233";
//        $data['country_birth'] = "India";
//        $data['residential_status'] = "";
//        $data['marital_status'] = "unmarried";
//        $data['occupation'] = "software Developer";
//        $data['pan_number'] = "Ind12345";
//        $data['income_group'] = "";
//        $data['political_affiliations'] = "";
//        $data['userprofile_id'] = "";
//        $data['user_status'] = "";
//         return response()->json([
//            'status' => 'success',
//            'userprofile' => $data
//        ], 200);
         $validator = Validator::make($request->all(), [
          'email' => 'required|email|max:255',
          'firstname' => 'required|string|max:100',
          'lastname' => 'required|string|max:100',
          'dob' => 'required|string|max:100',
          'userid' => 'required|string|max:100',
          'mobile_number' => 'required|string|max:255',
          'occupation' => 'required|string|max:100',
          'pan_number' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['email'] = $request['email'];
        $reqData['firstname'] = $request['firstname'];
        $reqData['lastname'] = $request['lastname'];
        $reqData['dateofbirth'] = $request['dob'];
        //$reqData['userid'] = $request['userid'];
        $reqData['mobileno'] = $request['mobile_number'];
        $reqData['occupation'] = $request['occupation'];
        $reqData['pannumber'] = $request['pan_number'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
        $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
        //dd($getUserInfo);
        if($getCustomerDetailsData)
        {
            $customerDetailsData = $this->customerdetails->UpdateCustomerDetails($reqData,$getCustomerInfo[0]['customerid']);
            return response()->json([
            'status' => 'Customer Details Updated Successfully',
            'customerdetails' => $getCustomerDetailsData
        ], 200);
        }
        else
        {
            
       $checkDuplicateEmail=$this->customerdetails->checkDuplicateMailExists($reqData['email']);
        if(count($checkDuplicateEmail)>0){
           $status['error']="Duplicate. Email already Exists";
           return $status;
        }else{
            
            $reqData['customerid'] = $getCustomerInfo[0]['customerid'];
     $customerDetailsData = $this->customerdetails->InsertCustomerDetails($reqData);
//     dd($customerDetailsData);
     if($customerDetailsData == 0)
     {
         //$getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getUserInfo[0]['customerid']);
          return response()->json([
            'status' => 'Customer Details Added Successfully',
            'customerdetails' => $getCustomerDetailsData
        ], 200);
     }
        }
        }
        

          }
   elseif($request['action'] == "customerbank")
          {
        // $request['account_num'] = "122";
         $validator = Validator::make($request->all(), [
          'account_num' => 'required|string|max:255',
          'account_type' => 'required|string|max:100',
          'full_name' => 'required|string|max:100',
          'ifsc_code' => 'required|string|max:100',
          'micr_code' => 'required|string|max:100',
          'addressline1' => 'required|string|max:255',
          'addressline2' => 'required|string|max:100',
          'address3' => 'required|string|max:100',
          'city' => 'required|string|max:100',
          'country' => 'required|string|max:100',
          'bankname' => 'required|string|max:100',
          'branchname' => 'required|string|max:100',
          'pincode' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['bankname'] = $request['bankname'];
        $reqData['branchname'] = $request['branchname'];
        $reqData['accno'] = $request['account_num'];
        $reqData['acctype'] = $request['account_type'];
        $reqData['full_name'] = $request['full_name'];
        $reqData['ifsccode'] = $request['ifsc_code'];
        $reqData['micr_code'] = $request['micr_code'];
        $reqData['address1'] = $request['addressline1'];
        $reqData['address2'] = $request['addressline2'];
        $reqData['address3'] = $request['address3'];
        $reqData['cityid'] = $request['city'];
        $reqData['countryid'] = $request['country'];
        $reqData['pincode'] = $request['pincode'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
       
        $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
        $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo[0]['customerid']);
//        dd($customerBankData[0]['customerbankid']); 
        if($customerBankData)
         {
         $bankData = $this->customerbank->UpdateCustomerBankDetails($reqData,$customerBankData[0]['customerbankid']);
         if($bankData)
         {
         $customerBankData = $this->customerbank->getCustomerBankDetailsById($customerBankData[0]['customerbankid']);
                      return response()->json([
            'status' => 'Bank Details Updated Successfully',
            'customerbankdetails' => $customerBankData
        ], 200);
         }
         else
         {
                      return response()->json([
            'status' => 'Bank Details Updated Failed',
            'customerbankdetails' => $customerBankData
        ], 200);
         }

         }
         else
         {
             $reqData['customerid'] = $getCustomerInfo[0]['customerid'];
          $bankData = $this->customerbank->InsertCustomerBankDetails($reqData);
          if($bankData)
          {
            $customerBankData = $this->customerbank->getCustomerBankDetailsById($bankData);
          return response()->json([
            'status' => 'Bank Details Added Successfully',
            'customerbankdetails' => $customerBankData
        ], 200);
          }
          else
          {
              return response()->json([
            'status' => 'Bank Details Added Failed'
        ], 200);
          }
          
         }
       
          }
   elseif($request['action'] == "customernominee")
          {
          
        $data3['Name'] = "string";
        $data3['guardian_name'] = "string";
        $data3['relationship'] = "string";
        $data3['customerid'] = "1";
        $data3['nominee_address'] = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        $data3['nominee_dob'] = "24";
        $data3['nominee_share'] = "string";
        $data3['nominee_id'] = "string";
        $data3['userid'] = "3";
        
        $data4['Name'] = "string";
        $data4['guardian_name'] = "string";
        $data4['relationship'] = "string";
        $data4['customerid'] = "1";
        $data4['nominee_address'] = (object)array(
            'addressline1' => "string",
            'addressline2' => "string",
            'city' => "string",
            'country' => "string",
            'state' => "string",
            'pincode' => "string",
            'address_id' => "string"
        );
        $data4['nominee_dob'] = "24";
        $data4['nominee_share'] = "string";
        $data4['nominee_id'] = "string";
        $data4['userid'] = "3";
        
       $nomineeData = [
            'nominee1' => $data3,
            'nominee2' => $data4
        ];
//        return response()->json([
//               // 'status' => 'error',
//                'nominee1' => $data3,
//            'nominee2' => $data4
//            ], 200);
          //dd($nomineeData);
     //  dd($nomineeData['nominee1']['userid']);
       $nomineeCount = count($nomineeData);
       $getCustomerInfo = $this->customer->getUserDetails($nomineeData['nominee1']['userid']);
          foreach ($nomineeData as $key => $value) {
              
         $value['addressline1'] = $value['nominee_address']->addressline1;
         $value['addressline2'] = $value['nominee_address']->addressline2;
         $value['city'] = $value['nominee_address']->city;
         $value['country'] = $value['nominee_address']->country;
         $value['state'] = $value['nominee_address']->state;
         $value['pincode'] = $value['nominee_address']->pincode;
         //$value['customerid'] = 1;
         $validator = Validator::make($value, [
          'Name' => 'required|string|max:255',
          'guardian_name' => 'required|string|max:100',
          'relationship' => 'required|string|max:100',
          'addressline1' => 'required|string|max:255',
          'addressline2' => 'required|string|max:100',
          'city' => 'required|string|max:100',
          'country' => 'required|string|max:100',
          'state' => 'required|string|max:100',
          'pincode' => 'required|string|max:100',
          'nominee_dob'=> 'required|string|max:100',
          'nominee_share'=> 'required|string|max:100',
          'customerid' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['name'] = $value['Name'];
        $reqData['guardianname'] = $value['guardian_name'];
        $reqData['relation'] = $value['relationship'];
        $reqData['address1'] = $value['addressline1'];
        $reqData['address2'] = $value['addressline2'];
        $reqData['city'] = $value['city'];
        $reqData['country'] = $value['country'];
        $reqData['state'] = $value['state'];
        $reqData['pincode'] = $value['pincode'];
        $reqData['dateofbirth'] = $value['nominee_dob'];
        //$reqData['nominee_share'] = $request['nominee_share'];
        //$reqData['customerid'] = $value['customerid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
       
        $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
        $customerBankData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo[0]['customerid']);
       $count = count($customerBankData);
        
//         dd($nomineeCount);
       
        if($count >= $nomineeCount )
        {
            
            //dd($customerBankData);
            $nomineeData = $this->customernominee->UpdateCustomerNomineeDetails($customerBankData[0]['customernomineeid']);
            if($nomineeData)
            {
                $customerBankData = $this->customernominee->getCustomerNomineeDetailsById($customerBankData[0]['customernomineeid']);
                return response()->json([
            'status' => 'Nominee Details Updated Successfully',
            'customernomineedetails' => $customerBankData
            ], 200);
            }
            else
            {
               return response()->json([
            'status' => 'Nominee Details Updated Failed',
            //'customerbankdetails' => $customerBankData
            ], 400); 
            }
        }
        else
        {
            $reqData['customerid'] = $getCustomerInfo[0]['customerid'];
            $nomineeData = $this->customernominee->InsertCustomerNomineeDetails($reqData);
            if($nomineeData)
            {
                
                
            }
            else
            {
               return response()->json([
            'status' => 'Nominee Details Added Failed',
            //'customerbankdetails' => $customerBankData
            ], 400); 
            }
            
        }
         
         
          }
          //$customerBankData = $this->customernominee->getCustomerNomineeDetailsById($nomineeData);
          $customerBankData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo[0]['customerid']);
//          dd($customerBankData);
          return response()->json([
            'status' => 'Nominee Details Added Successfully',
            'customernomineedetails' => $customerBankData
            ], 200);
       
          }
          
   elseif($request['action'] == "customeraddress")
          {
          
        $data1['addressline1'] = "string";
        $data1['addressline2'] = "string";
        $data1['city'] = "10000";
        $data1['country'] = "10000";
        $data1['state'] = "10000";
        $data1['pincode'] = "500082";
        $data1['address_id'] = "string";
        $data1['customerid'] = "1";
        $data1['address_type'] = "correspondence_address";
        
        $data2['addressline1'] = "string";
        $data2['addressline2'] = "string";
        $data2['city'] = "10000";
        $data2['country'] = "10000";
        $data2['state'] = "10000";
        $data2['pincode'] = "500082";
        $data2['address_id'] = "string";
        $data2['customerid'] = "1";
        $data2['address_type'] = "permanent_address";
       $customerAddressData = [
            'correspondence_address' => $data1,
            'permanent_address' => $data2
        ];
//          dd($customerAddressData);
          foreach ($customerAddressData as $key => $value) {
         $validator = Validator::make($value, [
          'addressline1' => 'required|string|max:255',
          'addressline2' => 'required|string|max:100',
          'city' => 'required|string|max:100',
          'country' => 'required|string|max:100',
          'state' => 'required|string|max:100',
          'pincode' => 'required|string|max:100',
          'customerid' => 'required|string|max:100',
          'address_type' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['address1'] = $value['addressline1'];
        $reqData['address2'] = $value['addressline2'];
        $reqData['cityid_fk'] = $value['city'];
        $reqData['countryid_fk'] = $value['country'];
        $reqData['stateid_fk'] = $value['state'];
        $reqData['pincode'] = $value['pincode'];
        $reqData['address_type'] = $value['address_type'];
        $reqData['customerid'] = $value['customerid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
       
         $bankData = $this->customeraddress->InsertCustomerAddress($reqData);
         
          }
         $status['success']="Customer Address Details Added Successfully";
         return $status;
       
          }
    }


    public function signIn(Request $request)
    {
         $validator = Validator::make($request->all(), [
             'email' => 'required|email|max:200',
             'password' => 'required|string|max:8',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
        
        $email = $request['email'];
        $password = $request['password'];
        $userData = $this->usersprofile->getUserDetails($email,$password);
        if($userData)
        {
            return response()->json([
              'status' => 'Login Success',
              'userProfile' => $userData
          ], 200); 
        }
        else
        {
             return response()->json([
              'status' => 'Login Failed Invalid Credentials'
          ], 400);
        }
         
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:100',
          'email' => 'required|email|max:255|unique:users',
          'firstname' => 'required|string|max:100',
          'lastname' => 'required|string|max:100',
          'dob' => 'required|string|max:100',
          'email' => 'required|string|max:100',
          'customer_id' => 'required|string|max:100',
          'agent_id' => 'required|string|max:100',
          'salutation_name' => 'required|string|max:100',
          'mobile_number' => 'required|string|max:100',
          'country_birth' => 'required|string|max:100',
          'residential_status' => 'required|string|max:100',
          'marital_status' => 'required|string|max:100',
          'occupation' => 'required|string|max:100',
          'pan_number' => 'required|string|max:100',
          'income_group' => 'required|string|max:100',
          'political_affiliations' => 'required|string|max:100',
          'userprofile_id' => 'required|string|max:100',
          'user_status' => 'required|string|max:100',
           'addressline1' => 'required|string|max:100',
            'addressline2' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:100',
            'address_id' => 'required|string|max:100',
            'Name' => 'required|string|max:100',
            'guardian_name' => 'required|string|max:100',
            'relationship' => 'required|string|max:100',
            'nominee_share' => 'required|string|max:100',
            'nominee_id' => 'required|string|max:100',
            'nominee_dob' => 'required|string|max:100',
            'account_num' => 'required|string|max:100',
            'account_type' => 'required|string|max:100',
            'full_name' => 'required|string|max:100',
            'ifsc_code' => 'required|string|max:100',
            'micr_code' => 'required|string|max:100',
            'bank_id' => 'required|string|max:100',

      ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
        
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
    public function edit(Request $request)
    {
//        $data['firstname'] = "vinod";
//        $data['lastname'] = "naik";
//        $data['dob'] = "10-04-1992";
//        $data['email'] = "vinod@gmail.com";
//        $data['customer_id'] = "1";
//        $data['agent_id'] = "1";
//        $data['salutation_name']= "kp";
//        $data['mobile_number'] = "1231312233";
//        $data['country_birth'] = "India";
//        $data['residential_status'] = "";
//        $data['marital_status'] = "unmarried";
//        $data['occupation'] = "software Developer";
//        $data['pan_number'] = "Ind12345";
//        $data['income_group'] = "";
//        $data['political_affiliations'] = "";
//        $data['userprofile_id'] = "";
//        $data['user_status'] = "";
//         return response()->json($data);
         $validator = Validator::make($request->all(), [
          'firstname' => 'required|string|max:100',
          'lastname' => 'required|string|max:100',
          'dob' => 'required|string|max:100',
          'email' => 'required|string|max:100',
          'customer_id' => 'required|string|max:100',
          'agent_id' => 'required|string|max:100',
          'salutation_name' => 'required|string|max:100',
          'mobile_number' => 'required|string|max:100',
          'country_birth' => 'required|string|max:100',
          'residential_status' => 'required|string|max:100',
          'marital_status' => 'required|string|max:100',
          'occupation' => 'required|string|max:100',
          'pan_number' => 'required|string|max:100',
          'income_group' => 'required|string|max:100',
          'political_affiliations' => 'required|string|max:100',
          'userprofile_id' => 'required|string|max:100',
          'user_status' => 'required|string|max:100'

      ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
    }

     public function changeAddress(Request $request)
    {
//        $data = (object)array(
//            'addressline1' => "string",
//            'addressline2' => "string",
//            'city' => "string",
//            'country' => "string",
//            'state' => "string",
//            'pincode' => "string",
//            'address_id' => "string"
//        );
//        
//         return response()->json($data);
         $validator = Validator::make($request->all(), [
             'addressline1' => 'required|string|max:100',
            'addressline2' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:100',
            'address_id' => 'required|string|max:100',
             ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 200);
      }
    }
    
    public function changePassword(Request $request)
    {
//        $data = (object)array(
//            'addressline1' => "string",
//            'addressline2' => "string",
//            'city' => "string",
//            'country' => "string",
//            'state' => "string",
//            'pincode' => "string",
//            'address_id' => "string"
//        );
//        
//         return response()->json($data);
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|max:8',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    public function forgotPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
    public function signOut(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|email|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
     public function setTranscationPassword(Request $request)
    {
//        dd(2);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    public function getTranscationPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
     public function EmailOTPVerify(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
    public function PhoneOTPVerify(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
     public function editCustomerSettings(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'setting_id' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
    }
    
     public function profileStatus(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|string|max:255',
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
