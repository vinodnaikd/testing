<?php

namespace App\Http\Controllers;
use App\Model\BSE;
use App\Model\Fundroi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class BSEController extends Controller
{

    public function __construct(
        Fundroi $fundroi
    )
    {
        $this->fundroi = $fundroi;
    }

   /* $userId = Envrionment.get("")
    $memberId = Environment.get("")*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderPassword(Request $request)
    {
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
      dd($this->getOrderPassword($request));
      $now = Carbon::now();
      $TransCode = $request['TransCode'];
      $TransNo = $now->format('YmdHisu').'_'.rand(); //Generate dynamic TransNo -max 19 digit .201912264309840398_rand
      // dd($TransNo);
      $OrderId = $request['OrderId']; // new order will be empty
      $UserID = $request['UserID'];
      $MemberId = $request['MemberId'];

      $ClientCode = $request['ClientCode']; //Generated value in SSO table . user that value
      $Password = $request['Password'];
      $PassKey = $request['PassKey'];
      $SchemeCd = $request['SchemeCd']; //BSE scheme code - Match amc code with bse scheme master .
      $BuySell = "P";//$request['BuySell']; //read it from parameter
      $BuySellType = "FRESH";//$request['BuySellType'];
      $DPTxn = "P";//$request['DPTxn'];
      $OrderVal = $request['OrderVal']; //read from parameter
      $Qty = $request['Qty']; //apply to sell only 
      $AllRedeem = "N";//$request['AllRedeem'];//apply to sell only 
      $FolioNo = "";//$request['FolioNo'];//apply to sell only 
      $Remarks = "";//$request['Remarks'];
      $KYCStatus = "Y";//$request['KYCStatus']; //always Y
      $RefNo = $request['RefNo']; // use db order nbr.
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
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/orderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:orderEntryParam>\r\n         <!--Optional:-->\r\n         <bses:TransCode>".$TransCode."</bses:TransCode>\r\n         <!--Optional:-->\r\n         <bses:TransNo>".$TransNo."</bses:TransNo>\r\n         <!--Optional:-->\r\n         <bses:OrderId/>\r\n         <!--Optional:-->\r\n         <bses:UserID>".$UserID."</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:MemberId>".$MemberId."</bses:MemberId>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>".$ClientCode."</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:SchemeCd>".$SchemeCd."</bses:SchemeCd>\r\n         <!--Optional:-->\r\n         <bses:BuySell>".$BuySell."</bses:BuySell>\r\n         <!--Optional:-->\r\n         <bses:BuySellType>".$BuySellType."</bses:BuySellType>\r\n         <!--Optional:-->\r\n         <bses:DPTxn>".$DPTxn."</bses:DPTxn>\r\n         <!--Optional:-->\r\n         <bses:OrderVal>".$OrderVal."</bses:OrderVal>\r\n         <!--Optional:-->\r\n         <bses:Qty/>\r\n         <!--Optional:-->\r\n         <bses:AllRedeem>".$AllRedeem."</bses:AllRedeem>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:KYCStatus>".$KYCStatus."</bses:KYCStatus>\r\n         <!--Optional:-->\r\n         <bses:RefNo>".$RefNo."</bses:RefNo>\r\n         <!--Optional:-->\r\n         <bses:SubBrCode/>\r\n         <!--Optional:-->\r\n         <bses:EUIN/>\r\n         <!--Optional:-->\r\n         <bses:EUINVal>".$EUINVal."</bses:EUINVal>\r\n         <!--Optional:-->\r\n         <bses:MinRedeem>".$MinRedeem."</bses:MinRedeem>\r\n         <!--Optional:-->\r\n         <bses:DPC>".$DPC."</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>".$Password."</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>".$PassKey."</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Parma1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:orderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/orderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function MFSipOrder(Request $request)
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
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>NEW</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>2341543155553353</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>02G</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>37872</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>TRL12R073</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>3787201</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>P</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>P</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>27/12/2019</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>MONTHLY</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>1</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>1000.00</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>12</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>Y</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>N</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>N</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>pABEo/Ul8WtJeGKojYdmd8xyBfKls/FAwoQkQtHZutCdXreNM6hved9zJQ674AW8</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>cdefghijkls123</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
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
        $validator = Validator::make($request->all(), [
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
      }
      $UserId = $request['UserId'];
      $MemberId = $request['MemberId'];
      $Password = $request['Password'];
      $PassKey = $request['PassKey'];

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
    return $response;
    }

     public function getPaymentLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'UserId' => 'required|string|max:255',
          'MemberId' => 'required|string|max:100',
          'Password' => 'required|string|max:100',
          'Flag' => 'required|string|max:100',
          ]);
          if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $UserId = $request['UserId'];
      $MemberId = $request['MemberId'];
      $Password = $request['Password'];
      $ClientCode = $request['ClientCode'];
      $Flag = $request['Flag'];

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
    return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BSE  $bSE
     * @return \Illuminate\Http\Response
     */
    public function show(BSE $bSE)
    {
        //
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
