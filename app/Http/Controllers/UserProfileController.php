<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\CustomerDetails;
use App\Models\Nominee;
use App\Models\CustomerAddress;
use App\Models\Notification;
use App\Models\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Carbon\Carbon;
use App\User;
// use JWTFactory;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\RequestOptions;


class UserProfileController extends Controller
{
     public function __construct(
        UserProfile $usersprofile,
        Customer $customer,
        CustomerDetails $customerdetails,
        Bank $customerbank,
        Nominee $customernominee,
        CustomerAddress $customeraddress,
        Notification $customernotifications,
        EmailNotification $emailnotification
    )
    {
        $this->usersprofile = $usersprofile;
        $this->customer = $customer;
        $this->customerdetails = $customerdetails;
        $this->customerbank = $customerbank;
        $this->customernominee = $customernominee;
        $this->customeraddress = $customeraddress;
        $this->customernotifications = $customernotifications;
        $this->eventsNotification = $emailnotification;
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
    public function generateOTP(){
      $otp = mt_rand(1000,9999);
      return $otp;
  }

    public function signUp(Request $request)
    {
        //$reqData = $request->all();
        $validator = Validator::make($request->all(), [
          'first_name' => 'required|string|max:100',
          //'last_name' => 'required|string|max:100',
          'email' => 'required|email|max:255',
          'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
          'password_confirmation' => 'min:6',
          'mobile_number' => 'required|string|max:11',
          'pannumber' => 'required|string|max:100'
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }

      $otp = $this->generateOTP();
      // dd($otp);
      $reqData['username'] = $request['first_name'];
      $reqData['email'] = $request['email'];
      $reqData['password'] = bcrypt($request['password']);
      //$reqData['password'] = $request['password'];
      $reqData['mobileno'] = $request['mobile_number'];
      $reqData['pannumber'] = $request['pannumber'];
      $reqData['applicationid'] = 1;
      $reqData['otp'] = $otp;
      $reqData['otp_expiry'] = Carbon::now();
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
         $esn['userid'] = $reqData1['userid'];
         $esn['type'] = "";
        // 
         if($customerData)
         {
         $reqData['mobileno'];
          $msg="Dear%20Customer,%20your%20OTP%20for%20login%20into%20WERT%20is%20".$otp.".%20Use%20this%20otp%20to%20validate%20your%20login.";
    $customer=file_get_contents("http://sms.kloudportal.com/WebServiceSMS.aspx?User=KloudPortal&passwd=9299152641&mobilenumber=".$reqData['mobileno']."&message=".$msg."&sid=KITESP&mtype=N");
    
    //http://bhashsms.com/api/sendmsg.php?user=cnuonline&pass=java123*&sender=forden&phone=".$reqData['mobileno']."&text=".$msg."&priority=ndnd&stype=normal
         }
     }
     $data['success']="User Created Successfully";
     if($request->all())
{
  $client = new \GuzzleHttp\Client();
  /*$endpoint = "https://opalcrm.kloudportal.com/api/crm/registration";
$email = $request['email'];
$company_name = "WERT";
$name = $request['first_name'];
$mobile = $request['mobile_number'];
$password = $request['password'];
// $value = "P@ssw0rd@1";
$response = $client->request('post', $endpoint, ['query' => [
    'email' => $email, 
    'company_name' => $company_name,
    'name' => $name, 
    'work_number' => $mobile,
    'password' => $password,
    'conform_password' => $password
]]);
$statusCode = $response->getStatusCode();
$content = json_decode($response->getBody(), true);*/
/*if($client)
{*/
  $login = "https://opalcrm.kloudportal.com/api/crm/login";
$client = new \GuzzleHttp\Client();
$email = "trew.fintech@gmail.com";//$request['email'];
$password = "P@ssw0rd@1";//$request['password'];
$response = $client->request('POST', $login, ['query' => [
    'email' => $email, 
    'password' => $password,
]]);
$statusCode = $response->getStatusCode();
$loginres = json_decode($response->getBody(), true);
if($loginres)
{
  $addlead = "https://opalcrm.kloudportal.com/api/crm/leads";
  $token = $loginres['access_token'];

$response = $client->get(
    'https://httpbin.org/bearer',
    [
        RequestOptions::HEADERS => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]
    ]
);
$tokendata = json_decode($response->getBody()->getContents());
// dd($loginres);

$name = $request['first_name'];
$email = $request['email'];
$primary_number = $request['mobile_number'];
$lead_type = "Hot";
$company_id = $loginres['data']['company_id'];
$user_id = $loginres['data']['id'];
$lead_stage = "lead";
$response = $client->request('post', $addlead, ['query' => [
    'name' => $name, 
    'primary_number' => $primary_number,
    'email' => $email, 
    'lead_type' => $lead_type,
    'company_id' => $company_id, 
    'user_id' => $user_id,
    'lead_stage' => $lead_stage,
    'token' => $token
]]);
$statusCode = $response->getStatusCode();
$content = json_decode($response->getBody(), true);
}
// }
}

        }
     
            return $data;
      }

    }

    public function resendOTP(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'email' => 'required|email|max:255',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $otp = $this->generateOTP();
      $reqData['otp'] = $otp;
      $reqData['otp_expiry'] = Carbon::now();
      $userData = $this->usersprofile->checkDuplicateMailExists($request['email']);
      if($userData)
      {
        $mobileno = $userData[0]['mobileno'];
        $userid = $userData[0]['userid'];
        $otpData = $this->usersprofile->UpdateUser($reqData,$userid);
         $msg="Dear%20Customer,%20your%20OTP%20for%20login%20into%20WERT%20is%20".$otp.".%20Use%20this%20otp%20to%20validate%20your%20login.";
    $customer=file_get_contents("http://sms.kloudportal.com/WebServiceSMS.aspx?User=KloudPortal&passwd=9299152641&mobilenumber=".$mobileno."&message=".$msg."&sid=KITESP&mtype=N");
        $status = "otp was successfully sent";
      }
      else
      {
        $status = "otp sending failed";
      }
      return response()->json([
              'status' => $status,
               ], 200);
    }

    public function otpVerify(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'email' => 'required|email|max:255',
          'otp' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $checkotp=$this->usersprofile->OTPVerify($request['email'],$request['otp']);
      if($checkotp)
      {
        $otpexpiry = $checkotp['otp_expiry'];
        $mytime = Carbon::now();
        $currenttime = $mytime->toDateTimeString();
        $cexpdate = $mytime->toDateString();
        $cdate = date('Y-m-d',strtotime($otpexpiry));
        if($cexpdate == $cdate)
        {
          $exptimehour = (new Carbon($otpexpiry))->diff(new Carbon($currenttime))->format('%h');
          $exptimeminutes = (new Carbon($otpexpiry))->diff(new Carbon($currenttime))->format('%I');
          if($exptimehour == 0 && $exptimeminutes <= 30)
          {
             $status = "otp matched successfully";

             //User Information...
             $userData = $this->usersprofile->getUserDetails($request['email'],$checkotp['password']);

      // print_r($userData);die;
        if($userData)
     {
      $arr['mobileverified'] = 1;
      $updatemblotp = $this->usersprofile->UpdateUser($arr,$userData['userid']);
      $getCustomerInfo = $this->customer->getUserDetails($userData['userid']);
      $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo[0]['customerid']);
      $customerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
      $customerAddressData = $this->customeraddress->getCustomerAddress($getCustomerInfo[0]['customerid']);
      $customernomineeData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo[0]['customerid']);
    if(!empty($customerBankData) && !empty($customerDetailsData) && !empty($customerAddressData) && !empty($customernomineeData))
    {
       $status = "true";
    }
    else
    {
       $status = "false";
    }
    $getCustomereventsInfo = $this->eventsNotification->getUserEvents($userData[0]['userid']);

          if(!empty($customerDetailsData))
           {
               $completed['userstatus'] = "true";
           }
           elseif(!empty($customerAddressData))
           {
               $completed['userstatus'] = "address";
           }
           elseif(!empty($customerBankData))
           {
               $completed['userstatus'] = "bankdetails";
           }
           else
           {
               $completed['userstatus'] = "addnominee";
           }
           $redirectionurl = "";
           if(empty($customerDetailsData))
           {
               $redirectionurl = "personalinfo";
               $completed['userstatus'] = "false";
           }
           elseif(empty($customerAddressData))
           {
               $redirectionurl = "address";
               $completed['userstatus'] = "false";
           }
           elseif(empty($customerBankData))
           {
               $redirectionurl = "bankdetails";
               $completed['userstatus'] = "false";
           }
           else
           {
               $redirectionurl = "addnominee";
               $completed['userstatus'] = "false";
           }         
           
        // $token = JWTAuth::fromUser($userData);
        // dd($token);
           if($userData['mobileverified'] == 0)
            $otpstatus = "false";
          else
            $otpstatus = "true";
            return response()->json([
              'status' => $status,
              'userProfile' => $userData,
              'redirection_url' => $redirectionurl,
              //'inflationvalue' => $inflation,
              'usercompleted' => $completed,
              'eventsInfo' => $getCustomereventsInfo,
              'registerstatus' => $status,
              'otpstatus' => $otpstatus
              // 'jwtToken' => $token,
               
          ], 200);
          }
        }
          else
          {
            $status = "otp time expired";
            $code = 400;
          }
        }
        else
        {
          $status = "otp time expired";
          $code = 400;
        }
      }
      else
      {
          $status = "Invalid otp details";
          $code = 400;
      }
       return response()->json([
              'status' => $status,
               ], $code);
    }

    public function Register(Request $request)
    {
      //dd($request->json());
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
            $customerdetailsArray = $request->json()->all();
            foreach ($customerdetailsArray as $key => $value) {
              # code...
            // print_r($value);
         $validator = Validator::make($value, [
          'email' => 'required|email|max:255',
          'firstname' => 'required|string|max:100',
          //'lastname' => 'required|string|max:100',
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
          'adharnum' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['email'] = $value['email'];
        $reqData['firstname'] = $value['firstname'];
       // $reqData['lastname'] = $value['lastname'];
        $reqData['dateofbirth'] = $value['dob'];
        //$reqData['userid'] = $request['userid'];
        $reqData['mobileno'] = $value['mobile_number'];
        $reqData['occupation'] = $value['occupation'];
        $reqData['pannumber'] = $value['pan_number'];
        $reqData['residential_status'] = $value['residential_status'];
        $reqData['income_group'] = $value['income_group'];
        $reqData['political_affiliations'] = $value['political_affiliations'];
        $reqData['country_birth'] = $value['country_birth'];
        $reqData['salution'] = $value['salution'];
        $reqData['marital_status'] = $value['marital_status'];
        $reqData['adharnum'] = $value['adharnum'];
        // $reqData['customertype'] = $value['customertype'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $getCustomerInfo = $this->customer->getUserDetails($value['userid']);
        $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);

        if($value['custdet_id'])
        {
            $customerDetailsData = $this->customerdetails->UpdateCustomerDetailsNew($reqData,$value['custdet_id']);
            if($customerDetailsData)
            {
                $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
                $status = 'Customer Details Updated Successfully';
                 /*return response()->json([
            'status' => 'Customer Details Updated Successfully',
            'customerdetails' => $getCustomerDetailsData
        ], 200);*/
            }
           
        }
        else
        {
            
       $checkDuplicateEmail=$this->customerdetails->checkDuplicateMailExists($reqData['email']);
       /*if($checkDuplicateEmail)
        if(count($checkDuplicateEmail)>0){
           $status['error']="Duplicate. Email already Exists";
           return $status;
        }else{*/
            $reqData['customerid'] = $getCustomerInfo[0]['customerid'];
     $customerDetailsData = $this->customerdetails->InsertCustomerDetails($reqData);
    // dd($customerDetailsData);
     if($customerDetailsData)
     {
         //dd($getCustomerDetailsData);
         $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
         $status = 'Customer Details Added Successfully';
          
     }
        //}
        }
        
}
return response()->json([
            'status' => $status,
            'customerdetails' => $getCustomerDetailsData
        ], 200);
          }
   elseif($request['action'] == "customerbank")
          {
        // $request['account_num'] = "122";
         $validator = Validator::make($request->json()->all(), [
          'account_num' => 'required|string|max:255',
          'account_type' => 'required|string|max:100',
          'full_name' => 'required|string|max:100',
          'ifsc_code' => 'required|string|max:100',
          //'micr_code' => 'required|string|max:100',
          'addressline1' => 'required|string|max:500',
          'addressline2' => 'required|string|max:500',
          'address3' => 'required|string|max:500',
          'city' => 'required|string|max:100',
          'country' => 'required|string|max:100',
          'state' => 'required|string|max:100',
          'bankname' => 'required|string|max:100',
          'branchname' => 'required|string|max:100',
          //'pincode' => 'required|string|max:100',
          'userid' => 'required|string|max:100',
          'effective_date' => 'required|string|max:100',
          'expiry_date' => 'required|string|max:100',
          'maximum_limit' => 'required|max:100',
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
        if($request['micr_code'])
        {
        $reqData['micr_code'] = $request['micr_code'];
        }
        else
        {
        $reqData['micr_code'] = "0";
        }
        $reqData['address1'] = $request['addressline1'];
        $reqData['address2'] = $request['addressline2'];
        $reqData['address3'] = $request['address3'];
        $reqData['city'] = $request['city'];
        $reqData['country'] = $request['country'];
        $reqData['state'] = $request['state'];
        $reqData['pincode'] = substr($reqData['address1'], -7);
        $reqData['effective_date'] = $request['effective_date'];
        $reqData['expiry_date'] = $request['expiry_date'];
        $reqData['maximum_limit'] = $request['maximum_limit'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
       
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo['customerid']);
       // dd($customerBankData); 
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
       
       $nomineeData = $request->json()->all();
      // dd($nomineeData);
       $getCustomerInfo = $this->customer->getUserDetailsrow($nomineeData['nominee']['userid']);
       // dd($getCustomerInfo['customerid']);
          foreach ($nomineeData as $key => $value) {
         $value['customerid'] = $getCustomerInfo['customerid'];
        /* $value['addressline1'] = $value['nominee_address']['addressline1'];
         $value['addressline2'] = $value['nominee_address']['addressline2'];
         $value['city'] = $value['nominee_address']['city'];
         $value['country'] = $value['nominee_address']['country'];
         $value['state'] = $value['nominee_address']['state'];
         $value['pincode'] = $value['nominee_address']['pincode'];*/
         //$value['customerid'] = 1;
         if($value['Name'])
         {
          // dd($value);
         $validator = Validator::make($value, [
          'Name' => 'required|string|max:255',
          //'guardian_name' => 'required|string|max:100',
          'relationship' => 'required|string|max:100',
          'percentage' => 'required|max:255',
          //'customerid' => 'required|string|max:100',
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
        $reqData['allottedpercent'] = $value['percentage'];
        /*$reqData['address2'] = $value['addressline2'];
        $reqData['city'] = $value['city'];
        $reqData['country'] = $value['country'];
        $reqData['state'] = $value['state'];
        $reqData['pincode'] = $value['pincode'];
        $reqData['dateofbirth'] = $value['nominee_dob'];*/
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
              $nomineeArr = array();
              foreach ($customerBankData as $key => $value) {
                $nominee['customernomineeid'] = $value['customernomineeid'];
                $nominee['name'] = $value['name'];
                $nominee['guardianname'] = $value['guardianname'];
                $nominee['relation'] = $value['relation'];
                $nominee['allottedpercent'] = $value['allottedpercent'];
                $nominee['customerid'] = $value['customerid'];
                array_push($nomineeArr, $nominee);
              }
            }
          }
          return response()->json([
            'status' => $status,
            'customernomineedetails' => $nomineeArr
            ], 200);
          }
          
   elseif($request['action'] == "customeraddress")
          {
      /* $validator = Validator::make($request->all(), [
          'customeraddress' => 'required|string',
           ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
          }*/
          
          // $customerAddressData = json_decode($request['customeraddress'],true);
          $customerAddressData = $request->json()->all();
          
           foreach ($customerAddressData['customeraddress'] as $key => $value) {

              // $value['customerid'] = $customerid;
         $validator = Validator::make($value, [
          'addressline1' => 'required|string|max:255',
          'addressline2' => 'required|string|max:100',
          'city' => 'required|string|max:100',
          'country' => 'required|string|max:100',
          'state' => 'required|string|max:100',
          'pincode' => 'required|string|max:100',
          'userid' => 'required|string|max:100',
          'address_type' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
          $customerid = $getCustomerInfo['customerid'];
        $value['customerid'] = $customerid;
        $reqData['address1'] = $value['addressline1'];
        $reqData['address2'] = $value['addressline2'];
        $reqData['city'] = $value['city'];
        $reqData['country'] = $value['country'];
        $reqData['state'] = $value['state'];
        $reqData['pincode'] = $value['pincode'];
        $reqData['address_type'] = $value['address_type'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
         
        $customerAddress = $this->customeraddress->getCustomerAddress($value['customerid']);
        if($value['address_id'])
        {
            //update
             $AddressData = $this->customeraddress->UpdateCustomerAddress($reqData,$value['address_id']);
             $status = "Customer Address Details Updated Successfully";
        }
        else
        {
            //Insert
            $reqData['customerid'] = $value['customerid'];
            $AddressData = $this->customeraddress->InsertCustomerAddress($reqData);
            $status = "Customer Address Details Added Successfully";
        }
         
          }
          if($AddressData)
          {
           $customerAddress = $this->customeraddress->getCustomerAddress($value['customerid']);
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
             'password' => 'required|string',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
        
       // $email = $request['email'];
       // $password = $request['password'];

         $credentials = $request->only('email', 'password');
       // $details=array('email'=>$request->email,'password'=>bcrypt($request->password));
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            $token = response()->json(compact('token'));
       
       $userData = Auth::user();
        if($userData)
     {
      $getCustomerInfo = $this->customer->getUserDetails($userData['userid']);
      $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo[0]['customerid']);
      $customerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo[0]['customerid']);
      // dd($customerDetailsData);
      $customerAddressData = $this->customeraddress->getCustomerAddress($getCustomerInfo[0]['customerid']);
      $customernomineeData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo[0]['customerid']);
    if(!empty($customerBankData) && !empty($customerDetailsData) && !empty($customerAddressData) && !empty($customernomineeData))
    {
       $status = "true";
    }
    else
    {
       $status = "false";
    }
    $getCustomereventsInfo = $this->eventsNotification->getUserEvents($userData['userid']);

            if(!empty($customerDetailsData))
           {
               $completed['personalinfo'] = "true";
           }
           if(!empty($customerAddressData))
           {
               $completed['address'] = "true";
           }
           if(!empty($customerBankData))
           {
               $completed['bankdetails'] = "true";
           }
           if(!empty($customernomineeData))
           {
               $completed['addnominee'] = "true";
           }
           $redirectionurl = "null";
           if(empty($customerDetailsData))
           {
            // echo 222;
               $redirectionurl = "personalinfo";
               $completed['personalinfo'] = "false";
           }
           elseif(empty($customerAddressData))
           {
               $redirectionurl = "address";
               $completed['address'] = "false";
           }
           elseif(empty($customerBankData))
           {
               $redirectionurl = "bankdetails";
               $completed['bankdetails'] = "false";
           }
           elseif(empty($customernomineeData))
           {
               $redirectionurl = "addnominee";
               $completed['addnominee'] = "false";
           }      
           
        // $token = JWTAuth::fromUser($userData);
        // dd($token);
           if($userData['mobileverified'] == 0)
            $otpstatus = "false";
          else
            $otpstatus = "true";
            return response()->json([
              'status' => 'Login Success',
              'userProfile' => $userData,
              'redirection_url' => $redirectionurl,
              //'inflationvalue' => $inflation,
              'usercompleted' => $completed,
              'eventsInfo' => $getCustomereventsInfo,
              'registerstatus' => $status,
              'otpstatus' => $otpstatus,
                'jwtToken' => $token,
               
          ], 200); 
        }
        else
        {
             return response()->json([
              'status' => 'Login Failed Invalid Credentials'
          ], 400);
        }
         
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
    
    public function getRegistraionDetails(Request $request) {
        
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
            $customerBankData = $this->customerbank->getCustomerBankDetails($getCustomerInfo['customerid']);
            $customerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo['customerid']);
            $customerAddressData = $this->customeraddress->getCustomerAddress($getCustomerInfo['customerid']);
            $customernomineeData = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo['customerid']);
            if($customerDetailsData)
            {
                $customerDetails = $customerDetailsData;
            }
            else
            {
                $customerDetails = array();
            }
            if($customerAddressData)
            {
                $customerAddress = $customerAddressData;
            }
            else
            {
                $customerAddress = array();
            }
            if($customerBankData)
            {
                $customerBank = $customerBankData;
            }
            else
            {
                $customerBank = array();
            }
            if($customernomineeData)
            {
                $customernominee = $customernomineeData;
            }
            else
            {
                $customernominee = array();
            }
            
            return response()->json([
            'status' => 'success',
            'customerDetailsData' => $customerDetails,
            'customerAddressData' => $customerAddress,
            'customerBankData' => $customerBank,
            'customernomineeData' => $customernominee,
        ], 200);
    }

    public function RegisterData(Request $request)
    {
      //$action = $request['action'];
      $validator = Validator::make($request->all(), [
             'userid' => 'required|string|max:200',
             'action' => 'required|string|max:200'
        ]);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $action = $request['action'];
      if($action == "customerdetails")
      {
        $getCustomerDetailsData = $this->customerdetails->getCustomerDetails($getCustomerInfo['customerid']);
        if($getCustomerDetailsData)
          $getCustomerDetailsData[0]['customer_type'] = "personal";
        if(isset($getCustomerDetailsData[1]['customerid']))
        {
          $getCustomerDetailsData[1]['customer_type'] = "guardian";
        }
          return response()->json([
            'status' => 'Success',
            'customerdetails' => $getCustomerDetailsData
        ], 200);
      }
      elseif($action == "customerbank")
      {
        $getCustomerBankDetailsData = $this->customerbank->getCustomerBankDetails($getCustomerInfo['customerid']);
          return response()->json([
            'status' => 'Success',
            'customerBankdetails' => $getCustomerBankDetailsData
        ], 200);
      }
      elseif($action == "customernominee")
      {

        $getCustomerNomineeDetails = $this->customernominee->getCustomerNomineeDetails($getCustomerInfo['customerid']);
         $nomineeArr = array();
              foreach ($getCustomerNomineeDetails as $key => $value) {
                $nominee['customernomineeid'] = $value['customernomineeid'];
                $nominee['name'] = $value['name'];
                $nominee['guardianname'] = $value['guardianname'];
                $nominee['relation'] = $value['relation'];
                $nominee['allottedpercent'] = $value['allottedpercent'];
                $nominee['customerid'] = $value['customerid'];
                if($key == 0)
                {
                  $nominee['nominee'] = "nominee1";
                }
                elseif ($key == 1) {
                  $nominee['nominee'] = "nominee2";
                }
                else
                {
                  $nominee['nominee'] = "nominee3";
                }
                array_push($nomineeArr, $nominee);
              }
          return response()->json([
            'status' => 'Success',
            'customernomineeData' => $nomineeArr
        ], 200);
      }
      elseif($action == "customeraddress")
      {
        $getCustomerAddress = $this->customeraddress->getCustomerAddress($getCustomerInfo['customerid']);
          return response()->json([
            'status' => 'Success',
            'customerAddress' => $getCustomerAddress
        ], 200);
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
         $validator = Validator::make($request->json()->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
            'new_password' => 'min:6|required_with:conform_password|same:conform_password',
            'conform_password' => 'min:6',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['email'] = $request['email'];
        $reqData['password'] = bcrypt($request['new_password']);

            $credentials = $request->only('email', 'password');
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            $token = response()->json(compact('token'));
       $userData = Auth::user();
       // dd($userData);
        /*$userData = $this->usersprofile->getUserDetails($request['email'],$request['old_password']);*/
        if($userData)
     {
        $updateUserPwd = $this->usersprofile->UpdateUserPassword($reqData,$request['email']);
        if($updateUserPwd)
        {
           $status = 'Password Updated Successfully';
           $code = "200";
        }
        else
        {
          $status = 'Password Updation Failed';
          $code = "400";
        }
     }
     else
     {
        $status = 'Invalid Credentials';
        $code = "400";
     }
        
         return response()->json([
                'status' => $status
            ], $code);
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
        if($checkUser)
        {
          //$resetpasswordlink = "localhost:8000/api/v1/users/resetpassword";
        //ToDo Email 
            $userid = $checkUser[0]['userid'];
            $status = "Mail Sent Successfully";
        }
        else
        {
            $status = "Mail Sending Failed";
        }
        
        //dd($checkUser);
        return response()->json([
                'status' => $status
            ], 200);
    }
    
        public function resetPassword(Request $request)
    {
        
        $validator = Validator::make($request->json()->all(), [
            'email' => 'required|email|max:255',
            'new_password' => 'min:8|required_with:conform_password|same:conform_password',
            'conform_password' => 'min:8',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['email'] = $request['email'];
        $reqData['password'] = bcrypt($request['new_password']);
        $updateUserPwd = $this->usersprofile->UpdateUserPassword($reqData,$request['email']);
        if($updateUserPwd)
        {
           $status = 'Password Updated Successfully';
        }
        else
        {
          $status = 'Password Updation Failed';
        }
         return response()->json([
                'status' => $status
            ], 200);
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

     public function getBankInfoWithIFSC(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'ifsc' => 'required|string|max:255',
        ]);
      if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        
        $bankData = json_decode(file_get_contents("https://ifsc.razorpay.com/".$request['ifsc']),true);
//catch exception
       
        if($bankData)
        {
          return $bankData;
        }
        else
        {
          return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 404);
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
