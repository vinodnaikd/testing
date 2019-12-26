<?php

namespace App\Http\Controllers;
use App\Model\BSE;
use Illuminate\Http\Request;

class BSEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPassword(Request $request)
    {
        // dd($request->all());
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
    CURLOPT_POSTFIELDS =>"<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:ns=\"http://bsestarmfdemo.bseindia.com/2016/01/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPassword</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFUploadService/MFUploadService.svc/Basic</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <ns:getPassword>\r\n \r\n         <ns:UserId>3787201</ns:UserId>\r\n         <!--Optional:-->\r\n         <ns:MemberId>37872</ns:MemberId>\r\n         <!--Optional:-->\r\n         <ns:Password>@12345</ns:Password>\r\n         <!--Optional:-->\r\n         <ns:PassKey>cdefghijkls123</ns:PassKey>\r\n      </ns:getPassword>\r\n   </soap:Body>\r\n</soap:Envelope>",
    CURLOPT_HTTPHEADER => array(
    "Content-Type:  application/soap+xml;charset=UTF-8;action=\"http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPassword\""
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $doc = new \DOMDocument();
    $doc->loadXML($response);
    $Password = str_replace("http://bsestarmfdemo.bseindia.com/2016/01/IMFUploadService/getPasswordResponse100|","",$doc->textContent);

    return $Password;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MFNewOrder(Request $request)
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
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/orderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:orderEntryParam>\r\n         <!--Optional:-->\r\n         <bses:TransCode>NEW</bses:TransCode>\r\n         <!--Optional:-->\r\n         <bses:TransNo>20192136944326694223</bses:TransNo>\r\n         <!--Optional:-->\r\n         <bses:OrderId/>\r\n         <!--Optional:-->\r\n         <bses:UserID>3787201</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:MemberId>37872</bses:MemberId>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>TRL12R073</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:SchemeCd>02G</bses:SchemeCd>\r\n         <!--Optional:-->\r\n         <bses:BuySell>P</bses:BuySell>\r\n         <!--Optional:-->\r\n         <bses:BuySellType>FRESH</bses:BuySellType>\r\n         <!--Optional:-->\r\n         <bses:DPTxn>P</bses:DPTxn>\r\n         <!--Optional:-->\r\n         <bses:OrderVal>25000</bses:OrderVal>\r\n         <!--Optional:-->\r\n         <bses:Qty/>\r\n         <!--Optional:-->\r\n         <bses:AllRedeem>N</bses:AllRedeem>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:KYCStatus>Y</bses:KYCStatus>\r\n         <!--Optional:-->\r\n         <bses:RefNo>3243243242324</bses:RefNo>\r\n         <!--Optional:-->\r\n         <bses:SubBrCode/>\r\n         <!--Optional:-->\r\n         <bses:EUIN/>\r\n         <!--Optional:-->\r\n         <bses:EUINVal>N</bses:EUINVal>\r\n         <!--Optional:-->\r\n         <bses:MinRedeem>N</bses:MinRedeem>\r\n         <!--Optional:-->\r\n         <bses:DPC>N</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>pABEo/Ul8WtJeGKojYdmd8xyBfKls/FArMUrxSSjalrlZJiqN85xZBvQN7D+dbSk</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>cdefghijkls123</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Parma1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:orderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
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
      CURLOPT_POSTFIELDS =>"\r\n<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:bses=\"http://bsestarmf.in/\">\r\n   <soap:Header xmlns:wsa=\"http://www.w3.org/2005/08/addressing\"><wsa:Action>http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam</wsa:Action><wsa:To>http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc</wsa:To></soap:Header>\r\n   <soap:Body>\r\n      <bses:sipOrderEntryParam>\r\n         <!--Optional: NEW /CXL  (Cancellation)-->\r\n         <bses:TransactionCode>NEW</bses:TransactionCode>\r\n         <!--Optional:-->\r\n         <bses:UniqueRefNo>2341543152993323</bses:UniqueRefNo>\r\n         <!--Optional:-->\r\n         <bses:SchemeCode>02G</bses:SchemeCode>\r\n         <!--Optional:-->\r\n         <bses:MemberCode>37872</bses:MemberCode>\r\n         <!--Optional:-->\r\n         <bses:ClientCode>TRL12R073</bses:ClientCode>\r\n         <!--Optional:-->\r\n         <bses:UserID>3787201</bses:UserID>\r\n         <!--Optional:-->\r\n         <bses:InternalRefNo/>\r\n         <!--Optional:-->\r\n         <bses:TransMode>P</bses:TransMode>\r\n         <!--Optional:-->\r\n         <bses:DpTxnMode>P</bses:DpTxnMode>\r\n         <!--Optional:-->\r\n         <bses:StartDate>20/12/2019</bses:StartDate>\r\n         <!--Optional: MONTHLY/QUARTERLY/ WEEKLY -->\r\n         <bses:FrequencyType>MONTHLY</bses:FrequencyType>\r\n         <!--Optional:-->\r\n         <bses:FrequencyAllowed>1</bses:FrequencyAllowed>\r\n         <!--Optional:-->\r\n         <bses:InstallmentAmount>1000.00</bses:InstallmentAmount>\r\n         <!--Optional:-->\r\n         <bses:NoOfInstallment>12</bses:NoOfInstallment>\r\n         <!--Optional:-->\r\n         <bses:Remarks/>\r\n         <!--Optional:-->\r\n         <bses:FolioNo/>\r\n         <!--Optional:-->\r\n         <bses:FirstOrderFlag>Y</bses:FirstOrderFlag>\r\n         <!--Optional:-->\r\n         <bses:SubberCode/>\r\n         <!--Optional:-->\r\n         <bses:Euin/>\r\n         <!--Optional:-->\r\n         <bses:EuinVal>N</bses:EuinVal>\r\n         <!--Optional:-->\r\n         <bses:DPC>N</bses:DPC>\r\n         <!--Optional:-->\r\n         <bses:RegId/>\r\n         <!--Optional:-->\r\n         <bses:IPAdd/>\r\n         <!--Optional:-->\r\n         <bses:Password>pABEo/Ul8WtJeGKojYdmd8xyBfKls/FArMUrxSSjalrlZJiqN85xZBvQN7D+dbSk</bses:Password>\r\n         <!--Optional:-->\r\n         <bses:PassKey>cdefghijkls123</bses:PassKey>\r\n         <!--Optional:-->\r\n         <bses:Param1/>\r\n         <!--Optional:-->\r\n         <bses:Param2/>\r\n         <!--Optional:-->\r\n         <bses:Param3/>\r\n      </bses:sipOrderEntryParam>\r\n   </soap:Body>\r\n</soap:Envelope>",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/soap+xml;charset=UTF-8;action=\"http://bsestarmf.in/MFOrderEntry/sipOrderEntryParam\""
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
