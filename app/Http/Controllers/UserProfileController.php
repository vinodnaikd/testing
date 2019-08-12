<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\CustomerDetails;
use App\Models\Nominee;
use App\Models\CustomerAddress;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Carbon\Carbon;
use App\User;

class UserProfileController extends Controller
{
     public function __construct(
        UserProfile $usersprofile,
        Customer $customer,
        CustomerDetails $customerdetails,
        Bank $customerbank,
        Nominee $customernominee,
        CustomerAddress $customeraddress,
        Notification $customernotifications
    )
    {
        $this->usersprofile = $usersprofile;
        $this->customer = $customer;
        $this->customerdetails = $customerdetails;
        $this->customerbank = $customerbank;
        $this->customernominee = $customernominee;
        $this->customeraddress = $customeraddress;
        $this->customernotifications = $customernotifications;
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
    
     public function userregister(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed',
            'password_confirmation' => 'required|string|min:8|max:255',
            'mobile_number' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
       
        // dd($request['first_name']);
        $user = new User;
        $user->username = $request['first_name'];
        $user->email = $request['email'];
        $user->mobileno = $request['mobile_number'];
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
    
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
      $reqData['password'] = bcrypt($request['password']);
      $reqData['mobileno'] = $request['mobile_number'];
      $reqData['applicationid'] = 1;
      $reqData['createdutcdatetime'] = Carbon::now();
      $reqData['modifiedutcdatetime'] = Carbon::now();
      if($request['userid'])
      {
          $signUpData = $this->usersprofile->UpdateUser($reqData,$request['userid']);
     if($signUpData)
     {
         $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
         $reqData1['email'] = $request['email'];
         $reqData1['mobile'] = $request['mobile_number'];
         $reqData1['advisorid'] = 1;
         $reqData1['accountmanagerid'] = 1;
         //$reqData1['userid'] = $signUpData;
         $reqData1['createdutcdatetime'] = Carbon::now();
         $reqData1['modifiedutcdatetime'] = Carbon::now();
         $customerData = $this->customer->UpdateCustomer($reqData1,$getCustomerInfo[0]['customerid']);
     }
     $data['success']="User Updated Successfully";
     return $data;
        }
      
      else
      {
        $checkDuplicateEmail=$this->usersprofile->checkDuplicateMailExists($reqData['email']);
        if(count($checkDuplicateEmail)>0){
           $data['error']="Duplicate. Email already Exists";
           return $data;
           //flashy()->error('Duplicate Email Exists');
        }else{
     $signUpData = $this->usersprofile->InsertUser($reqData);
     if($signUpData)
     {
         $notificationArray = array(
             "Email Verification"=>'Email Verification was pending',
             "Personal Information"=>'Adding Personal Information was pending',
             "Address"=>'Adding Address was pending',
             "Bank Details"=>'Adding Bank Details was pending',
             "Nominee"=>'Adding Nominees was pending'
             );
             foreach ($notificationArray as $key => $value) {
                 $notf['notificationtext'] = $value;
                 $notf['userid'] = $signUpData;
                 $notf['createdutcdatetime'] = Carbon::now();
                 $notf['modifiedutcdatetime'] = Carbon::now();
                 $notificationsData = $this->customernotifications->InsertCustomerNotifications($notf);
             }
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
//       dd($request->all());
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
          'residential_status' => 'required|string|max:100',
          'income_group' => 'required|string|max:100',
          'political_affiliations' => 'required|string|max:100',
          'country_birth' => 'required|string|max:100',
          'salution' => 'required|string|max:100',
          'marital_status' => 'required|string|max:100',
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
        $reqData['residential_status'] = $request['residential_status'];
        $reqData['income_group'] = $request['income_group'];
        $reqData['political_affiliations'] = $request['political_affiliations'];
        $reqData['country_birth'] = $request['country_birth'];
        $reqData['salution'] = $request['salution'];
        $reqData['marital_status'] = $request['marital_status'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
        $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
        //dd($getUserInfo);
        if($getCustomerDetailsData)
        {
            $customerDetailsData = $this->customerdetails->UpdateCustomerDetails($reqData,$getCustomerInfo[0]['customerid']);
            if($customerDetailsData)
            {
                $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
                 return response()->json([
            'status' => 'Customer Details Updated Successfully',
            'customerdetails' => $getCustomerDetailsData
        ], 200);
            }
           
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
         //dd($getCustomerDetailsData);
         $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
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
        $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo['customerid']);
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
             $reqData['customerid'] = $getCustomerInfo['customerid'];
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
          
//        $data3['Name'] = "string";
//        $data3['guardian_name'] = "raj";
//        $data3['relationship'] = "string";
//        $data3['customerid'] = "1";
//        $data3['nominee_address'] = (object)array(
//            'addressline1' => "string",
//            'addressline2' => "string",
//            'city' => "string",
//            'country' => "string",
//            'state' => "string",
//            'pincode' => "string",
//            'address_id' => "string"
//        );
//        $data3['nominee_dob'] = "24";
//        $data3['nominee_share'] = "string";
//        $data3['nominee_id'] = "string";
//        $data3['userid'] = "3";
//        $data3['customernomineeid'] = "24";
//        
//        $data4['Name'] = "string";
//        $data4['guardian_name'] = "ram";
//        $data4['relationship'] = "string";
//        $data4['customerid'] = "1";
//        $data4['nominee_address'] = (object)array(
//            'addressline1' => "string",
//            'addressline2' => "string",
//            'city' => "string",
//            'country' => "string",
//            'state' => "string",
//            'pincode' => "string",
//            'address_id' => "string"
//        );
//        $data4['nominee_dob'] = "24";
//        $data4['nominee_share'] = "string";
//        $data4['nominee_id'] = "string";
//        $data4['userid'] = "3";
//        $data4['customernomineeid'] = "25";
//        
//       $nomineeData = [
//            'nominee1' => $data3,
//            'nominee2' => $data4
//        ];
              $validator = Validator::make($request->all(), [
          'customernominee' => 'required|string',
           ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
          }
      // $request['customernominee'] = $nomineeData;
       $nomineeData = json_decode($request['customernominee'],true);
//       dd($dd['nominee1']);
//        return response()->json([
//               // 'status' => 'error',
//                'nominee1' => $data3,
//            'nominee2' => $data4
//            ], 200);
          //ddjson_decode($request['customernominee']));
          
     //  dd($nomineeData['nominee1']['userid']);
       $getCustomerInfo = $this->customer->getUserDetails($nomineeData['nominee1']['userid']);
          foreach ($nomineeData as $key => $value) {
             // print_r($value);
            //  die;
              //$getCustomerInfo = $this->customer->getUserDetails($nomineeData['nominee1']['userid']);
       // dd($getCustomerInfo['customerid']);
        //$customerid = $getCustomerInfo['customerid'];
         $value['customerid'] = $getCustomerInfo['customerid'];
         $value['addressline1'] = $value['nominee_address']['addressline1'];
         $value['addressline2'] = $value['nominee_address']['addressline2'];
         $value['city'] = $value['nominee_address']['city'];
         $value['country'] = $value['nominee_address']['country'];
         $value['state'] = $value['nominee_address']['state'];
         $value['pincode'] = $value['nominee_address']['pincode'];
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
          'customerid' => 'required|integer|max:100',
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
        $reqData['customerid'] = $value['customerid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
       
        
        $customerBankData = $this->customernominee->getCustomerNomineeDetails($value['customerid']);
      
        if($value['customernomineeid'])
        {
            
            $nomineeData = $this->customernominee->UpdateCustomerNomineeDetails($reqData,$value['customernomineeid']);
            $status = "Nominee Details Updated Successfully";
        }
        else
        {
            //$reqData['customerid'] = $customerid;
            $nomineeData = $this->customernominee->InsertCustomerNomineeDetails($reqData);
            $status = "Nominee Details Added Successfully";
            
        }
          }
          if($nomineeData)
          {
              $customerBankData = $this->customernominee->getCustomerNomineeDetails($value['customerid']);
          return response()->json([
            'status' => $status,
            'customernomineedetails' => $customerBankData
            ], 200);
          }
          }
          
   elseif($request['action'] == "customeraddress")
          {
          
//        $data1['addressline1'] = "hyderabad";
//        $data1['addressline2'] = "kphb";
//        $data1['city'] = "10000";
//        $data1['country'] = "10000";
//        $data1['state'] = "10000";
//        $data1['pincode'] = "500085";
//        $data1['address_id'] = "18";
//        $data1['customerid'] = "1";
//        $data1['address_type'] = "correspondence_address";
//        
//        $data2['addressline1'] = "jntu";
//        $data2['addressline2'] = "hyderabad";
//        $data2['city'] = "10000";
//        $data2['country'] = "10000";
//        $data2['state'] = "10000";
//        $data2['pincode'] = "500086";
//        $data2['address_id'] = "19";
//        $data2['customerid'] = "1";
//        $data2['address_type'] = "permanent_address";
//       $customerAddressData = [
//            'correspondence_address' => $data1,
//            'permanent_address' => $data2
//        ];
       
//        return response()->json([
//           // 'status' => $status,
//            'customeraddress' => $customerAddressData
//            ], 200);
//          $addressCount = count($customerAddressData);
       $validator = Validator::make($request->all(), [
          'customeraddress' => 'required|string|max:255',
           ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
          }
        $customerAddressData = $request['customeraddress'];
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
        //$reqData['customerid'] = $value['customerid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
         $getCustomerInfo = $this->customer->getUserDetails($request['userid']);
        // dd($getCustomerInfo);
        $customerAddress = $this->customeraddress->getCustomerAddress($getCustomerInfo[0]['customerid']);
//        $custAddressCount = count($customerAddress);
        if($value['address_id'])
        {
            //update
             $AddressData = $this->customeraddress->UpdateCustomerAddress($reqData,$value['address_id']);
             $status = "Customer Address Details Updated Successfully";
        }
        else
        {
            //Insert
            $reqData['customerid'] = $getCustomerInfo[0]['customerid'];
            $AddressData = $this->customeraddress->InsertCustomerAddress($reqData);
            $status = "Customer Address Details Added Successfully";
        }
         
         
          }
         //$status['success']="Customer Address Details Added Successfully";
          if($AddressData)
          {
           $customerAddress = $this->customeraddress->getCustomerAddress($getCustomerInfo[0]['customerid']);
                  return response()->json([
            'status' => $status,
            'customeraddress' => $customerAddress
            ], 200);
          }
       
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
         if (! $token = Auth::guard('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $signInData = $this->respondWithToken($token);
        //$password = bcrypt($request->password);
        $userData['userProfile'] = Auth::user();
        //$userData['userProfile'] = $this->usersprofile->getUserDetails($email,$password);
        //dd($currentUser);
        $userData['usertoken'] =$signInData;
        return $userData;
        //$userData = $this->usersprofile->getUserDetails($email,$password);
//        if($userData)
//        {
//            //dd($userData[0]['userid']);
//            $getCustomerInfo = $this->customer->getUserDetails($userData[0]['userid']);
//            $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo[0]['customerid']);
//            $customerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
//            $customerAddressData = $this->customeraddress->getCustomerAddress($getCustomerInfo[0]['customerid']);
//            $customernomineeData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo[0]['customerid']);
//            if(empty($customerDetailsData))
//            {
//                $redirectionurl = "localhost:8000/api/v1/users/register";
//            }
//            elseif(empty($customerAddressData))
//            {
//                $redirectionurl = "localhost:8000/api/v1/users/register";
//            }
//            elseif(empty($customerBankData))
//            {
//                $redirectionurl = "localhost:8000/api/v1/users/register";
//            }
//            else
//            {
//                $redirectionurl = "localhost:8000/api/v1/users/register";
//            }
//            
//            return response()->json([
//              'status' => 'Login Success',
//              'userProfile' => $userData,
//              'redirection_url' => $redirectionurl,
//              'inflationvalue' => $inflation,
//          ], 200); 
//        }
//        else
//        {
//             return response()->json([
//              'status' => 'Login Failed Invalid Credentials'
//          ], 400);
//        }
         
    }
    
        protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
    
        public function refresh() {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    public function logout() {
        Auth::guard('api')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
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
        $checkUser = $this->usersprofile->checkDuplicateMailExists($request['email']);
        //$resetpasswordlink = "localhost:8000/api/v1/users/resetpassword";
        $userid = $checkUser[0]['userid'];
        //ToDo Email 
        //dd($checkUser);
    }
    
        public function resetPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255',
            'new_password' => 'min:6|required_with:conform_password|same:conform_password',
            'conform_password' => 'min:6',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['userid'] = $request['userid'];
        $reqData['password'] = $request['new_password'];
        $updateUserPwd = $this->usersprofile->UpdateUserPassword($reqData,$request['userid']);
        if($updateUserPwd)
        {
            return response()->json([
                'status' => 'Password Updated Successfully'
            ], 200);
        }
        //ToDo Email 
        //dd($checkUser);
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
        $reqData['userid'] = $request['user_id'];
        $reqData['transcation_password'] = $request['password'];
        
          $AddressData = $this->usersprofile->setUserTranscationPassword($reqData,$reqData['userid']);      
           return response()->json([
            'status' => 'Transcation Password was Successfully Set',
            'customeraddress' => $customerAddress
            ], 200);
        
        
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
