<?php

namespace App\Http\Controllers;

use App\Models\FundBasicInfo;
use App\Models\FundInfo;
use App\Models\FundPerformance;
use App\Models\FundRecord;
use App\Models\FundClass;
use App\Models\fundProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Carbon\Carbon;
class FundBasicInfoController extends Controller
{
    public function __construct(
        FundBasicInfo $fundBasicInfo,
        FundInfo $fundInfo,
        FundPerformance $fundPerformance,
        FundClass $fundclass,
        FundProducts $fundproducts,
        FundRecord $fundrecord
    )
    {
        $this->fundBasicInfo = $fundBasicInfo;
        $this->fundInfo = $fundInfo;
        $this->fundPerformance = $fundPerformance;
        $this->fundclass = $fundclass;
        $this->fundproducts = $fundproducts;
        $this->fundrecord = $fundrecord;
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
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'customerid' => 'required|string|max:100',
          'customergoalid' => 'required|string|max:100',
          'fundid' => 'required|string|max:255',
          'orderno' => 'required|string|max:255',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }

      $reqData['customerid'] = $request['customerid'];
      $reqData['customergoalid'] = $request['customergoalid'];
      $reqData['fundid'] = $request['fundid'];
      $reqData['orderno'] = $request['orderno'];
      $reqData['customerfundid'] = $request['customerfundid'];
      $reqData['createdutcdatetime'] = Carbon::now();
      $reqData['modifiedutcdatetime'] = Carbon::now();
      if($request['customerfundid'])
      {
           $fundposttranData = $this->fundBasicInfo->UpdateCustomerFundPostTran($reqData,$request['customerfundid']);
           $status="FundPostTran Updated Successfully";
           $id = $request['customerfundid'];
      }
      else
      {
           $fundposttranData = $this->fundBasicInfo->InsertCustomerFundPostTran($reqData);
           $status="FundPostTran Created Successfully";
           $id = $fundposttranData;
           
      }
      if($fundposttranData)
      {
         $fundPostTranData = $this->fundBasicInfo->getCustomerFundPostTran($id);
       return response()->json([
              'status' => $status,
              'fundPostTranData' => $fundPostTranData
          ], 200);
      }
    }
    
    public function funddataposttran(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'customerid' => 'required|string|max:100',
          'startdate' => 'required|string|max:255',
          'purchasetype' => 'required|string|max:255',
           'customerfundid' => 'required|string|max:100',
          'sipamount' => 'required|string|max:100',
          'sipmonthlydate' => 'required|string|max:255',
          'sipduration' => 'required|string|max:255',
           'lumpsumamount' => 'required|string|max:100',
          'nextsipdate' => 'required|string|max:100',
           'enddate' => 'required|string|max:100',
         
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }

      $reqData['customerid'] = $request['customerid'];
      $reqData['funddataid'] = $request['funddataid'];
      $reqData['startdate'] = $request['startdate'];
      $reqData['purchasetype'] = $request['purchasetype'];
      $reqData['customerfundid'] = $request['customerfundid'];
      $reqData['sipamount'] = $request['sipamount'];
      $reqData['sipmonthlydate'] = $request['sipmonthlydate'];
      $reqData['sipduration'] = $request['sipduration'];
      $reqData['lumpsumamount'] = $request['lumpsumamount'];
      $reqData['nextsipdate'] = $request['nextsipdate'];
      $reqData['enddate'] = $request['enddate'];
      $reqData['createdutcdatetime'] = Carbon::now();
      $reqData['modifiedutcdatetime'] = Carbon::now();
      if($request['funddataid'])
      {
           $funddataposttranData = $this->fundInfo->UpdateCustomerFundDataPostTran($reqData,$request['funddataid']);
           $status="FundDataPostTran Updated Successfully";
           $id = $request['funddataid'];
      }
      else
      {
           $funddataposttranData = $this->fundInfo->InsertCustomerFundDataPostTran($reqData);
           $status="FundDataPostTran Created Successfully";
           $id = $funddataposttranData;
           
      }
      if($funddataposttranData)
      {
         $funddataPostTranData = $this->fundInfo->getCustomerFundDataPostTran($id);
       return response()->json([
              'status' => $status,
              'FundDataPostTran' => $funddataPostTranData
          ], 200);
      }
    }
    
    public function funddetailposttran(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'customerid' => 'required|string|max:100',
          'funddataid' => 'required|string|max:255',
          'fundid' => 'required|string|max:255',
          'purchasetype' => 'required|string|max:255',
           'customerfundid' => 'required|string|max:100',
          'units' => 'required|string|max:100',
          'purchasenavvalue' => 'required|string|max:255',
          'purchasevalue' => 'required|string|max:255',
           'investmentamount' => 'required|string|max:100',
          'transactionstatus' => 'required|string|max:100',
           'transactiondate' => 'required|string|max:100',
           'transactionrefcode' => 'required|string|max:100',
           'remarks' => 'required|string|max:100',
         
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }

      $reqData['customerid'] = $request['customerid'];
      $reqData['funddataid'] = $request['funddataid'];
      $reqData['fundid'] = $request['fundid'];
      $reqData['purchasetype'] = $request['purchasetype'];
      $reqData['customerfundid'] = $request['customerfundid'];
      $reqData['transactiondate'] = $request['transactiondate'];
      $reqData['units'] = $request['units'];
      $reqData['purchasenavvalue'] = $request['purchasenavvalue'];
      $reqData['purchasevalue'] = $request['purchasevalue'];
      $reqData['investmentamount'] = $request['investmentamount'];
      $reqData['transactionstatus'] = $request['transactionstatus'];
      $reqData['transactionrefcode'] = $request['transactionrefcode'];
      $reqData['remarks'] = $request['remarks'];
      $reqData['createdutcdatetime'] = Carbon::now();
      $reqData['modifiedutcdatetime'] = Carbon::now();
      if($request['funddetailid'])
      {
           $funddetailposttranData = $this->fundPerformance->UpdateCustomerFundDetailPostTran($reqData,$request['funddataid']);
           $status="FundDetailPostTran Updated Successfully";
           $id = $request['funddetailid'];
      }
      else
      {
           $funddetailposttranData = $this->fundPerformance->InsertCustomerFundDetailPostTran($reqData);
           $status="FundDetailPostTran Created Successfully";
           $id = $funddetailposttranData;
           
      }
      if($funddetailposttranData)
      {
         $funddetailPostTranData = $this->fundPerformance->getCustomerFundDetailPostTran($id);
       return response()->json([
              'status' => $status,
              'FundDetailPostTran' => $funddetailPostTranData
          ], 200);
      }
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
    
    public function getFundsDetails()
   {
        
        //Get the nri elligbility and pass to getFundProducts
      $nrielligble = "";
      $fundclassassests = $this->fundclass->getFundClassAssestType();
      $fundAssets = array();
      foreach($fundclassassests as $key =>$value)
      {
         $assests['assettype'] = $value['assettype'];
         $fundclassData = $this->fundclass->getFundClass($value['assettype']);

         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            $fund['subcategory'] = $value1['subcategory'];

            $fundProducts = array();
           $fundprodcutsData = $this->fundproducts->getFundProducts($value1['fundclassid']);
         foreach($fundprodcutsData as $key2 => $value2)
         {
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         $assests['fundclass'] = $fundClass;
         array_push($fundAssets, $assests);
      }
      return response()->json([
              'funds' => $fundAssets
          ], 200);
   }

   public function getCustomerSelectedProducts()
   {
        
           $fundprodcutsData = $this->fundrecord->getCustomerSelectedProducts(16);
           //dd($fundprodcutsData);
        /* foreach($fundprodcutsData as $key2 => $value2)
         {
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              array_push($fundProducts, $products);
         }*/
             
      return response()->json([
              'fundslist' => $fundprodcutsData
          ], 200);
   }

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
