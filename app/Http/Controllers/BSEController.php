<?php

namespace App\Http\Controllers;
use App\Models\BSE;
use App\Models\Fundroi;
use App\Models\FundRecord;
use App\Models\UserProfile;
use App\Models\Customer;
use App\Models\Customerpertransactionfeed;
use App\Models\FundInfo;
use App\Models\FundPerformance;
use App\Models\Customerfundposttran;
use App\Models\GlobalCurrNav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class BSEController extends Controller
{

    public function __construct(
        Fundroi $fundroi,
        FundRecord $fundrecord,
        UserProfile $userprofile,
        Customerpertransactionfeed $customerpertransactionfeed,
        Customer $customer,
        FundInfo $fundInfo,
        Customerfundposttran $customerfundposttran,
        FundPerformance $fundPerformance,
        GlobalCurrNav $globalnav
    )
    {
        $this->fundroi = $fundroi;
        $this->fundrecord = $fundrecord;
        $this->userprofile = $userprofile;
        $this->customerpertransactionfeed = $customerpertransactionfeed;
        $this->customer = $customer;
        $this->customerfundposttran = $customerfundposttran;
        $this->fundInfo = $fundInfo;
        $this->fundPerformance = $fundPerformance;
        $this->globalnav = $globalnav;
    }

   /* $userId = Envrionment.get("")
    $memberId = Environment.get("")*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderPasswordDefault()
    {
      
      $UserId = "3787201";
      $MemberId = "37872";
      $Password = "@123456";
      $PassKey = "cdefghijkls123";

        $curl = curl_init();
        curl_setopt_array($curl, array(
  CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/getPassword</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:getPassword>\r\n         <!--Optional:-->\r\n         <bses:UserId>".$UserId."</bses:UserId>\r\n         \r\n         <bses:Password>".$Password."</bses:Password>\r\n  \r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n \r\n\r\n      </bses:getPassword>\r\n   </soap:Body>\r\n</soap:Envelope>",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/getPassword\""
  ),
));

    $response = curl_exec($curl);
    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
    $genPassword = str_replace("http://bsestarmf.in/MFOrderEntry/getPasswordResponse100|","",$doc->textContent);
    $data['genpassword'] = $genPassword;
    $data['UserId'] = $UserId;
    $data['MemberId'] = $MemberId;
    $data['password'] = $Password;
    $data['passkey'] = $PassKey;

    return $data;
    }


    public function getOrderPassword(Request $request)
    {
      // echo 111;
      // echo $userId = getenv('BSE_USER_ID');
        $validator = Validator::make($request->all(), [
          'UserId' => 'required|string|max:255',
         // 'MemberId' => 'required|string|max:100',
          'Password' => 'required|string|max:100',
          'PassKey' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $UserId = $request['UserId'];
     // $MemberId = $request['MemberId'];
      $Password = $request['Password'];
      $PassKey = $request['PassKey'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
  CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/getPassword</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:getPassword>\r\n         <!--Optional:-->\r\n         <bses:UserId>".$UserId."</bses:UserId>\r\n         \r\n         <bses:Password>".$Password."</bses:Password>\r\n  \r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n \r\n\r\n      </bses:getPassword>\r\n   </soap:Body>\r\n</soap:Envelope>",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/getPassword\""
  ),
));

$response = curl_exec($curl);
    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
    $Password = str_replace("http://bsestarmf.in/MFOrderEntry/getPasswordResponse100|","",$doc->textContent);

    return $Password;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MFNewOrderPurchase(Request $request)
    {
      $EncPassword = $this->getOrderPasswordDefault();
      $customerID = "192";
        $customerOrderData = $this->fundroi->getBseCustomerOrderData($customerID,"L");
      foreach($customerOrderData as $key =>$value)
      {
      $now = Carbon::now();
      $TransCode = "NEW";//$request['TransCode'];
      $TransNo = $now->format('YmdHisu');/*$customerdata['transcation_number'];*/// //Generate dynamic TransNo -max 19 digit .201912264309840398_rand
      // dd($TransNo);
      $OrderId = "";//$request['OrderId']; // new order will be empty
      $UserID = $EncPassword['UserId'];//$request['UserID'];
      $MemberId = "37872";//$request['MemberId'];

      $ClientCode = "TRL12R073";//$customerdata['client_code']
      $Password = $EncPassword['genpassword'];//$request['Password'];
      $PassKey = $EncPassword['passkey'];;//$request['PassKey'];
      $SchemeCd = $value['fundid'];//"02G";//$request['SchemeCd']; //BSE scheme code - Match amc code with bse scheme master .
      $BuySell = "P";//$request['BuySell']; //read it from parameter
      $BuySellType = "FRESH";//$request['BuySellType'];
      $DPTxn = "P";//$request['DPTxn'];
      $OrderVal = "30000";//$request['OrderVal']; //read from parameter
      $Qty = "";//$request['Qty']; //apply to sell only 
      $AllRedeem = "N";//$request['AllRedeem'];//apply to sell only 
      $FolioNo = "";//$request['FolioNo'];//apply to sell only 
      $Remarks = "";//$request['Remarks'];
      $KYCStatus = "Y";//$request['KYCStatus']; //always Y
      $RefNo = $value['orderno'];//$request['RefNo']; // use db order nbr.
      $SubBrCode = "99790";//$request['SubBrCode']; //use db subbroker code 
      $EUIN = "E119484";//$request['EUIN'];//Constant
      $EUINVal = "N";//$request['EUINVal']; //contant Y
      $MinRedeem = "N";//$request['MinRedeem']; //apply to sell only 
      $DPC = "N";//$request['DPC']; //constant
      $IPAdd = "";//$request['IPAdd']; //empty
      $Parma1 = "";//$request['IPAdd']; //empty
      $Parma2 = "";//$request['IPAdd']; //empty
      $parma3 = "";//$request['IPAdd']; //empty

        $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/orderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:orderEntryParam>\r\n         <!--Optional:-->\r\n         <bses:TransCode>".$TransCode."</bses:TransCode>\r\n         <!--Optional:-->\r\n         <bses:TransNo>".$TransNo."</bses:TransNo>\r\n         <!--Optional:-->\r\n         <bses:OrderId/>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:MemberId>".$MemberId."</bses:MemberId>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:SchemeCd>".$SchemeCd."</bses:SchemeCd>\r\n         <!--Optional:-->\r\n         <bses:BuySell>".$BuySell."</bses:BuySell>\r\n         <!--Optional:-->\r\n         <bses:BuySellType>".$BuySellType."</bses:BuySellType>\r\n         <!--Optional:-->\r\n         <bses:DPTxn>".$DPTxn."</bses:DPTxn>\r\n         <!--Optional:-->\r\n         <bses:OrderVal>".$OrderVal."</bses:OrderVal>\r\n         <!--Optional:-->\r\n         <bses:Qty/>\r\n         <!--Optional:-->\r\n         <bses:AllRedeem>".$AllRedeem."</bses:AllRedeem>\r\n         <!--Optional:-->\r\n                 <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:KYCStatus>".$KYCStatus."</bses:KYCStatus>\r\n         <!--Optional:-->\r\n         <bses:RefNo>".$RefNo."</bses:RefNo>\r\n         <!--Optional:-->\r\n         <bses:SubBrCode/>\r\n         <!--Optional:-->\r\n         <bses:EUIN/>\r\n         <!--Optional:-->\r\n         <bses:EUINVal>".$EUINVal."</bses:EUINVal>\r\n         <!--Optional:-->\r\n         <bses:MinRedeem>".$MinRedeem."</bses:MinRedeem>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Parma1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:orderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/orderEntryParam\""
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
$First = "ORDER NO: ";
$Second = "|0";
$Firstpos=strpos($doc->textContent, $First);
$Secondpos=strpos($doc->textContent, $Second);
$ordernum = str_replace("|0","",str_replace("ORDER NO: ","",substr($doc->textContent , $Firstpos, $Secondpos)));
// dd($doc);
$orderdata['order_number'] = $ordernum;
$orderdata['order_status'] = "bse completed";
$orderdata['customerorderid'] = $value['customerorderid'];
$orderdata['fundid'] = $value['fundid'];
$customerdata = $this->fundroi->updateBseOrderEntry($orderdata);
}
     return $ordernum;
    }

    public function MFNewOrderRedemption(Request $request)
    {
        // $customerdata = $this->fundroi->getBseInformation(61);
      $EncPassword = $this->getOrderPasswordDefault();
      $customerID = "61";
        $customerdata = $this->fundrecord->getBseInformation($customerID);
      // dd($customerdata);
      $now = Carbon::now();
      $TransCode = $request['TransCode'];
      $TransNo = $now->format('YmdHisu');/*$customerdata['transcation_number'];*/// //Generate dynamic TransNo -max 19 digit .201912264309840398_rand
      // dd($TransNo);
      $OrderId = "";//$request['OrderId']; // new order will be empty
      $UserID = $EncPassword['UserId'];//$request['UserID'];
      $MemberId = "37872";//$request['MemberId'];

      $ClientCode = "TRL12R073";//$request['ClientCode']; //Generated value in SSO table . user that value
      $Password = $EncPassword['genpassword'];//$request['PassKey'];
      $SchemeCd = "02G";//$request['SchemeCd']; //BSE scheme code - Match amc code with bse scheme master .
      $BuySell = "R";//$request['BuySell']; //read it from parameter
      $BuySellType = "FRESH";//$request['BuySellType'];
      $DPTxn = "P";//$request['DPTxn'];
      $OrderVal = "30000";//$request['OrderVal']; //read from parameter
      $Qty = "";//$request['Qty']; //apply to sell only 
      $AllRedeem = "Y";//$request['AllRedeem'];//apply to sell only 
      $FolioNo = "";//$request['FolioNo'];//apply to sell only 
      $Remarks = "";//$request['Remarks'];
      $KYCStatus = "Y";//$request['KYCStatus']; //always Y
      $RefNo = $customerdata['orderno'];//$request['RefNo']; // use db order nbr.
      $SubBrCode = "99790";//$request['SubBrCode']; //use db subbroker code 
      $EUIN = "E119484";//$request['EUIN'];//Constant
      $EUINVal = "N";//$request['EUINVal']; //contant Y
      $MinRedeem = "N";//$request['MinRedeem']; //apply to sell only 
      $DPC = "N";//$request['DPC']; //constant
      $IPAdd = "";//$request['IPAdd']; //empty
      $Parma1 = "";//$request['IPAdd']; //empty
      $Parma2 = "";//$request['IPAdd']; //empty
      $parma3 = "";//$request['IPAdd']; //empty
      $PassKey = $EncPassword['passkey'];
         $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/orderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:orderEntryParam>\r\n         <!--Optional:-->\r\n         <bses:TransCode>".$TransCode."</bses:TransCode>\r\n         <!--Optional:-->\r\n         <bses:TransNo>".$TransNo."</bses:TransNo>\r\n         <!--Optional:-->\r\n         <bses:OrderId/>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:MemberId>".$MemberId."</bses:MemberId>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:SchemeCd>".$SchemeCd."</bses:SchemeCd>\r\n         <!--Optional:-->\r\n         <bses:BuySell>".$BuySell."</bses:BuySell>\r\n         <!--Optional:-->\r\n         <bses:BuySellType>".$BuySellType."</bses:BuySellType>\r\n         <!--Optional:-->\r\n         <bses:DPTxn>".$DPTxn."</bses:DPTxn>\r\n                  <bses:FolioNo>".$FolioNo."</bses:FolioNo>\r\n         <!--Optional:-->\r\n         <bses:OrderVal>".$OrderVal."</bses:OrderVal>\r\n         <!--Optional:-->\r\n         <bses:Qty/>\r\n         <!--Optional:-->\r\n         <bses:AllRedeem>".$AllRedeem."</bses:AllRedeem>\r\n         <!--Optional:-->\r\n                 <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:KYCStatus>".$KYCStatus."</bses:KYCStatus>\r\n         <!--Optional:-->\r\n         <bses:RefNo>".$RefNo."</bses:RefNo>\r\n         <!--Optional:-->\r\n         <bses:SubBrCode/>\r\n         <!--Optional:-->\r\n         <bses:EUIN/>\r\n         <!--Optional:-->\r\n         <bses:EUINVal>".$EUINVal."</bses:EUINVal>\r\n         <!--Optional:-->\r\n         <bses:MinRedeem>".$MinRedeem."</bses:MinRedeem>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Parma1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:orderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/orderEntryParam\""
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
$First = "ORDER NO: ";
$Second = "|0";
$Firstpos=strpos($doc->textContent, $First);
$Secondpos=strpos($doc->textContent, $Second);
$ordernum = str_replace("|0","",str_replace("ORDER NO: ","",substr($doc->textContent , $Firstpos, $Secondpos)));
$orderdata['order_number'] = $ordernum;
$orderdata['orderstatus'] = "bse completed";
$orderdata['orderno'] = $customerdata['orderno'];
$customerdata = $this->fundroi->updateBseOrderEntry($orderdata);
     return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function MFSipCreateOrder(Request $request)
    {
      $EncPassword = $this->getOrderPasswordDefault();
      $now = Carbon::now();
      $TransactionCode = "NEW";
      $UniqueRefNo = $now->format('YmdHisu');//"23415431429833238";
      $SchemeCode = "02-DP"; // getBSEScheme(DetailPreTransTabe ->getSchemeCode() )get from db
      $MemberCode = "37872";
      $ClientCode = "TRL12R073"; //get from db
      $UserID = $EncPassword['UserId'];
      $TransMode = "P";
      $DpTxnMode = "P";
      $StartDate = "16/01/2020"; // request parameter
      $FrequencyType = "MONTHLY";
      $FrequencyAllowed = "1";
      $InstallmentAmount = "1000.00"; // get from db
      $NoOfInstallment = "12";
      $Remarks = "";
      $FolioNo = "";
      $FirstOrderFlag = "Y";
      $SubberCode = "NEW";
      $Euin = "NEW";
      $EuinVal = "N";
      $DPC = "N";
      $RegId = "";
      $IPAdd = "";
      $Password = $EncPassword['genpassword']; //get from defined function
      $PassKey = $EncPassword['passkey']; // request parameter

        $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>".$TransactionCode."</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>".$UniqueRefNo."</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>".$SchemeCode."</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>".$MemberCode."</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>".$TransMode."</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>".$DpTxnMode."</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>".$StartDate."</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>".$FrequencyType."</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>".$FrequencyAllowed."</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>".$InstallmentAmount."</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>".$NoOfInstallment."</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>".$FirstOrderFlag."</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>".$EuinVal."</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
    }

    public function MFSipCancelOrder(Request $request)
    {
      $EncPassword = $this->getOrderPasswordDefault();
      $now = Carbon::now();
      $TransactionCode = "CXL";
      $UniqueRefNo = $now->format('YmdHisu');//"23415431429833238";
      $SchemeCode = "02G"; // get from db
      $MemberCode = "37872";
      $ClientCode = "TRL12R073"; //get from db
      $UserID = $EncPassword['UserId'];
      $TransMode = "P";
      $DpTxnMode = "P";
      $StartDate = "16/01/2020"; // request parameter
      $FrequencyType = "MONTHLY";
      $FrequencyAllowed = "1";
      $InstallmentAmount = "1000.00"; // get from db
      $NoOfInstallment = "12";
      $Remarks = "";
      $FolioNo = "123456";
      $FirstOrderFlag = "Y";
      $SubberCode = "NEW";
      $Euin = "NEW";
      $EuinVal = "N";
      $DPC = "N";
      $RegId = "";
      $IPAdd = "";
      $Password = $EncPassword['genpassword']; //get from defined function
      $PassKey = $EncPassword['passkey']; // request parameter

        $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>".$TransactionCode."</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>".$UniqueRefNo."</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>".$SchemeCode."</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>".$MemberCode."</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>".$TransMode."</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>".$DpTxnMode."</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>".$StartDate."</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>".$FrequencyType."</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>".$FrequencyAllowed."</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>".$InstallmentAmount."</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>".$NoOfInstallment."</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>".$FirstOrderFlag."</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>".$EuinVal."</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
    }


  public function MFSipUpdate(Request $request)
  {
    $EncPassword = $this->getOrderPasswordDefault();
    $cusId = $this->customer->getUserDetailsrow($request['userid']);
    $schcode = $request['schemecode'];
    $sipdate = $request['sipdate'];
      $now = Carbon::now();
      $TransactionCode = "CXL";
      $UniqueRefNo = $now->format('YmdHisu');//"23415431429833238";
      $SchemeCode = $schcode; // get from db
      $MemberCode = "37872";
      $ClientCode = "TRL12R073"; //get from db
      $UserID = $EncPassword['UserId'];
      $TransMode = "P";
      $DpTxnMode = "P";
      $StartDate = $sipdate;//"16/01/2020"; // request parameter
      $FrequencyType = "MONTHLY";
      $FrequencyAllowed = "1";
      $InstallmentAmount = "1000.00"; // get from db
      $NoOfInstallment = "12";
      $Remarks = "";
      $FolioNo = "123456";
      $FirstOrderFlag = "Y";
      $SubberCode = "NEW";
      $Euin = "NEW";
      $EuinVal = "N";
      $DPC = "N";
      $RegId = "";
      $IPAdd = "";
      $Password = $EncPassword['genpassword']; //get from defined function
      $PassKey = $EncPassword['passkey']; // request parameter

        $curl1 = curl_init();
      curl_setopt_array($curl1, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>".$TransactionCode."</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>".$UniqueRefNo."</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>".$SchemeCode."</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>".$MemberCode."</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>".$TransMode."</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>".$DpTxnMode."</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>".$StartDate."</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>".$FrequencyType."</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>".$FrequencyAllowed."</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>".$InstallmentAmount."</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>".$NoOfInstallment."</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>".$FirstOrderFlag."</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>".$EuinVal."</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response1 = curl_exec($curl1);
    curl_close($curl1);
    if($response1)
    {
      $TransactionCode = "NEW";
       $UniqueRefNum = rand();//$now->format('YmdHisu').'2';//"23415431429833238";
      $SchemeCode = "02-DP"; // getBSEScheme(DetailPreTransTabe ->getSchemeCode() )get from db
      $MemberCode = "37872";
      $ClientCode = "TRL12R073"; //get from db
      $UserID = $EncPassword['UserId'];
      $TransMode = "P";
      $DpTxnMode = "P";
      $StartDate = "16/01/2020"; // request parameter
      $FrequencyType = "MONTHLY";
      $FrequencyAllowed = "1";
      $InstallmentAmount = "1000.00"; // get from db
      $NoOfInstallment = "12";
      $Remarks = "";
      $FolioNo = "";
      $FirstOrderFlag = "Y";
      $SubberCode = "NEW";
      $Euin = "NEW";
      $EuinVal = "N";
      $DPC = "N";
      $RegId = "";
      $IPAdd = "";
      $Password = $EncPassword['genpassword']; //get from defined function
      $PassKey = $EncPassword['passkey']; // request parameter

        $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>".$TransactionCode."</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>".$UniqueRefNum."</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>".$SchemeCode."</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>".$MemberCode."</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>".$TransMode."</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>".$DpTxnMode."</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>".$StartDate."</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>".$FrequencyType."</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>".$FrequencyAllowed."</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>".$InstallmentAmount."</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>".$NoOfInstallment."</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>".$FirstOrderFlag."</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>".$EuinVal."</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
    }
  }

public function MFSwitchOrder(Request $request)
    {
        $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>NEW</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>2341543152993323</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>02G</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>37872</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>TRL12R073</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>3787201</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>P</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>P</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>20/12/2019</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>MONTHLY</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>1</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>1000.00</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>12</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>Y</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>N</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>N</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>pABEo/Ul8WtJeGKojYdmd8xyBfKls/FArMUrxSSjalrlZJiqN85xZBvQN7D+dbSk</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>cdefghijkls123</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
    }

    public function UploadPassword(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
          'UserId' => 'required|string|max:255',
          'MemberId' => 'required|string|max:100',
          'Password' => 'required|string|max:100',
          'PassKey' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }*/
      $EncPassword = $this->getOrderPasswordDefault();
      $UserId = $EncPassword['UserId'];
      $MemberId = $EncPassword['MemberId'];
      $Password = $EncPassword['password'];
      $PassKey = $EncPassword['passkey'];

      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:ns=\"http://bsestarmfdemo.bseindia.com/2016/01/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPassword</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <ns:getPassword>\r\n \r\n         <ns:UserId>".$UserId."</ns:UserId>\r\n         <!--Optional:-->\r\n         <ns:MemberId>".$MemberId."</ns:MemberId>\r\n         <!--Optional:-->\r\n         <ns:Password>".$Password."</ns:Password>\r\n         <!--Optional:-->\r\n         <ns:PassKey>".$PassKey."</ns:PassKey>\r\n      </ns:getPassword>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type:  application/soap+xml;charset=UTF-8;action=\"http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPassword\""
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
    $genPassword = str_replace("http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPasswordResponse100|","",$doc->textContent);
    return $genPassword;
    }

     public function getPaymentLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'userid' => 'required|string|max:255'
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $EncPassword = $this->getOrderPasswordDefault();
      // dd($EncPassword);
      $UserId = $EncPassword['UserId'];
      $MemberId = $EncPassword['MemberId'];
      $Password = $EncPassword['genpassword'];

      $ClientCode = "TRL12R073";
      $Flag = "03";//$request['Flag'];
      $cusId = $this->customer->getUserDetailsrow($request['userid']);
      $customerID = $cusId['customerid'];
      $now = Carbon::now();
  $customerOrderData = $this->fundroi->getBseCustomerOrderFullData($customerID);
  $userdata = $this->userprofile->getUserInformationDetails($customerID);
      if($customerOrderData)
      {
         $custpost['customerid'] = $cusId['customerid'];
        $custpost['customergoalid'] = $customerOrderData[0]['customergoalid'];
        $custpost['fundid'] = $customerOrderData[0]['fundid'];
        $custpost['startdate'] = $customerOrderData[0]['startdate'];
        $custpost['orderno'] = $customerOrderData[0]['orderno'];
        $getCustomerFund = $this->customerfundposttran->AddCustomerOrderPost($custpost);
        if($getCustomerFund)
        {
          $custpostdata['customerfundid'] = $getCustomerFund;
          $custpostdata['customerid'] = $cusId['customerid'];
          $custpostdata['purchasetype'] = $customerOrderData[0]['purchasetype'];
          $custpostdata['startdate'] = $customerOrderData[0]['startdate'];
          $custpostdata['sipamount'] = $customerOrderData[0]['sipamount'];
          $custpostdata['sipmonthlydate'] = $customerOrderData[0]['sipmonthlydate'];
          $custpostdata['sipduration'] = $customerOrderData[0]['sipduration'];
          $custpostdata['lumpsumamount'] = $customerOrderData[0]['lumpsumamount'];
          $getCustomerFunddata = $this->fundInfo->InsertCustomerFundDataPostTran($custpostdata);
        }
        
      foreach($customerOrderData as $key =>$value)
      {
        $data['amc_code'] = $value['amc_code'];
        $data['broker _code'] = "99790";
        $data['user_code'] = $userdata['client_code'];
        $data['user_trxnno'] = $value['orderno'];
        $data['application_number'] = $now->format('YmdHisu');//random number
        $data['folio_number'] = "";//$value[''];
        $data['check-digitnumber'] = "";//$value[''];
        $data['trxn_type'] = "P";
        $data['scheme_code'] = $value['schemecode'];
        $data['investor_firstname'] = $userdata['username'];// $value[''];
        $data['joint_name'] = "";//$value[''];
        $data['address1'] = $userdata['address1'];//$value[''];
        $data['address2'] = $userdata['address2'];//$value[''];
        $data['city'] = $userdata['city'];//$value[''];
        $data['pincode'] = $userdata['pincode'];//$value[''];
        $data['phone_office'] = $userdata['mobile'];
        $data['transaction_date'] = Carbon::now();//Current Date;
        $data['transaction_time'] = "";//timestamp
        $data['units'] = "";//$value[''];
        $data['amount'] = "";//if condition
        $data['dateofbirth'] = "";//$value[''];
        $data['guardian_name'] = ""; //$userdata['']
        $data['pan_no'] = $userdata['pannumber'];//$value[''];
        $data['email_id'] = $userdata['email_id'];// $value[''];
        $data['account_number'] = $userdata['accno'];//$value[''];
        $data['account_type'] = $userdata['acctype'];//$value[''];
        $data['bank_name'] = $userdata['bankname'];//$value[''];
        $data['branch_name'] = $userdata['branchname'];//$value[''];
        $data['bank_city'] = "";//$value[''];
        $data['reinvest_option'] = "";//$value[''];
        $data['holding_nature'] = "";//$value[''];
        $data['occupation_code'] = $userdata['occupation'];//$value[''];
        $data['tax_status_code'] = "";//$value[''];

        $data['remarks'] = "";// $value[''];
        $data['state'] = $userdata['state'];//$value[''];
        $data['sub_trxn_type'] = "";//$value[''];
        $data['div_payout_mechanism'] = "";
        $data['ecs_number'] = "";
        $data['bank_code'] = "";//$value[''];
        $data['trnx_mode'] = "W";//$value[''];
        $data['trxn_sign_confn'] = "Y";//$value[''];
        $data['check_flag'] = "N";//$value[''];
        $data['kyc_status'] = "Y";//$value[''];
        $data['third_party_payment'] = "N";//$value[''];
        $data['sip_registration_number'] = "";//$value[''];

        $data['no_of _installments'] = "";// sip duration;
        $data['euin_opted'] = "Y";//$value[''];
        $data['euin'] = "E119484";//$value[''];
        $data['customerorderid'] = $value['customerorderid'];//$value[''];
        $data['customerid'] = $value['customerid'];//$value[''];
        $data['orderno'] = $value['orderno'];//$value[''];
        $data['orderstatus'] = $value['orderstatus'];//$value[''];
        $data['customergoalid'] = $value['customergoalid'];//$value[''];
        $data['fundid'] = $value['fundid'];//$value[''];
        $data['purchasetype'] = $value['purchasetype'];//$value[''];

        $data['paymenttype'] = $value['paymenttype'];// $value[''];
        $data['startdate'] = $value['startdate'];//$value[''];
        $data['sipmonthlydate'] = $value['sipmonthlydate'];//$value[''];
        $data['sipduration'] = $value['sipduration'];//$value[''];
        $data['sipunits'] = $value['sipunits'];//$value[''];
        $data['purchasenav'] = $value['purchasenav'];//$value[''];
        $data['lumpsumunits'] = $value['lumpsumunits'];//$value[''];
        $data['transactionstatus'] = $value['transactionstatus'];//$value[''];
        $data['sipamount'] = $value['sipamount'];//$value[''];
        $data['lumpsumamount'] = $value['lumpsumamount'];//$value[''];

       $prefeed = $this->customerpertransactionfeed->InsertCustomerOrderDetailsPretran($data);
             if($prefeed)
      {
       
        /*if($getCustomerFund)
        {*/
          /*$custpostdata['customerfundid'] = $getCustomerFund;
          $custpostdata['customerid'] = $cusId['customerid'];
          $custpostdata['purchasetype'] = $value['purchasetype'];
          $custpostdata['startdate'] = $value['startdate'];
          $custpostdata['sipamount'] = $value['sipamount'];
          $custpostdata['sipmonthlydate'] = $value['sipmonthlydate'];
          $custpostdata['sipduration'] = $value['sipduration'];
          $custpostdata['lumpsumamount'] = $value['lumpsumamount'];
          $getCustomerFunddata = $this->fundInfo->InsertCustomerFundDataPostTran($custpostdata);*/
          if($getCustomerFunddata)
          {
            $custpostdetail['customerfundid'] = $getCustomerFund;
            $custpostdetail['funddataid'] = $getCustomerFunddata;
            $custpostdetail['customerid'] = $cusId['customerid'];
            $custpostdetail['fundid'] = $value['fundid'];
            $custpostdetail['purchasetype'] = $value['purchasetype'];
            $custpostdetail['transactiondate'] = "";//$value['transaction_date'];
            
            $custpostdetail['purchasenavvalue'] = $value['purchasenav'];
            if($value['purchasetype'] == "L")
              $amount = $value['lumpsumamount'];
            else
              $amount = $value['sipamount'];
            $navunits = $this->globalnav->getCurrentNavValueByFundId($value['fundid']);
            $custpostdetail['units'] = $amount/$navunits['nav'];//$value['units'];
            $custpostdetail['purchasevalue'] = $amount;
            $custpostdetail['investmentamount'] = $amount;
            $custpostdetail['transactionstatus'] = "completed";
            $custpostdetail['customergoalid'] = $value['customergoalid'];
            $custpostdetail['folionumber'] = mt_rand();//$value['folio'];
            $getCustomerFunddetail = $this->fundPerformance->InsertCustomerFundDetailPostTran($custpostdetail);
          }
       // }

        $orderno = $customerOrderData[0]['orderno'];
        $customerid = $customerID;
        $updateprefeed = $this->fundrecord->updateCustomerOrderDetailsPretran($orderno,$customerid);
      }
      }
}
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:ns=\"http://bsestarmfdemo.bseindia.com/2016/01/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/MFAPI</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <ns:MFAPI>\r\n         <!--Optional:-->\r\n         <ns:Flag>".$Flag."</ns:Flag>\r\n         <!--Optional:-->\r\n         <ns:UserId>".$UserId."</ns:UserId>\r\n         <!--Optional:-->\r\n         <ns:EncryptedPassword>".$Password."</ns:EncryptedPassword>\r\n         <!--Optional:-->\r\n         <ns:param>".$MemberId."|".$ClientCode."|http://dev-savingsmanager.co.in</ns:param>\r\n      </ns:MFAPI>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type:  application/soap+xml;charset=UTF-8;action=\"http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/MFAPI\""
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
    $paymentLink = str_replace("http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/MFAPIResponse100|","",$doc->textContent);

    return $paymentLink;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BSE  $bSE
     * @return \Illuminate\Http\Response
     */
    public function ClientCodeCreation(Request $request)
    {
      $userdata = $this->userprofile->getUserData();
      $clientUrl = "".$userdata['client_code']."|SI|01|08|".$userdata['username']."|||".$userdata['dateofbirth']."|".$userdata['gender']."||".$userdata['pancard']."||||D|CDSL|12048800|1204880000205679|||".$userdata['bankname']."|".$userdata['accountnumber']."|641532002|".$userdata['ifsc']."|Y||||||||||||||||||||||NO 2 MADAKULAM CENTRE MAIN ROAD|PONMENI||MADURAI|TN|625016|INDIA|||||sdhk74@gmail.com|M|02|||||||||||||||9629999736";

      $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:ns=\"http://bsestarmfdemo.bseindia.com/2016/01/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/MFAPI</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <ns:MFAPI>\r\n         <!--Optional:-->\r\n         <ns:Flag>02</ns:Flag>\r\n         <!--Optional:-->\r\n         <ns:UserId>3787201</ns:UserId>\r\n         <!--Optional:-->\r\n         <ns:EncryptedPassword>pABEo/Ul8WtncKcuWTFCN8FLk3Gc/ibJTlww+ZYHprpqf3mSg37WfA==</ns:EncryptedPassword>\r\n         <!--Optional:-->\r\n         <ns:param>WERTH0209|SI|01|08|S DOCTOR HAKKIM KHAN|||10/11/1973|M||AGGPD6292F||||D|CDSL|12048800|1204880000205679|||SB|003690600000911|641532002|YESB0000036|Y||||||||||||||||||||||NO 2 MADAKULAM CENTRE MAIN ROAD|PONMENI||MADURAI|TN|625016|INDIA|||||sdhk74@gmail.com|M|02|||||||||||||||9629999736</ns:param>\r\n      </ns:MFAPI>\r\n   </soap:Body>\r\n</soap:Envelope>",
  CURLOPT_HTTPHEADER => array(
    "Content-Type:  application/soap+xml;charset=UTF-8;action=\"http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/MFAPI\""
  ),
));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BSE  $bSE
     * @return \Illuminate\Http\Response
     */
    public function edit(BSE $bSE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BSE  $bSE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BSE $bSE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BSE  $bSE
     * @return \Illuminate\Http\Response
     */
    public function destroy(BSE $bSE)
    {
        //
    }
}
