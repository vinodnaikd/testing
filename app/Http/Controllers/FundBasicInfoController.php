<?php

namespace App\Http\Controllers;

use App\Models\FundBasicInfo;
use App\Models\FundInfo;
use App\Models\FundPerformance;
use App\Models\Customerfundposttran;
use App\Models\FundRecord;
use App\Models\FundClass;
use App\Models\Customer;
use App\Models\FundProducts;
use App\Models\Fundroi;
use App\Models\CustomerDetails;
use App\Models\FundHoldings;
use App\Models\DashboardRecordsInfo;
use App\Models\Transcations;
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
        FundRecord $fundrecord,
        Customer $customer,
        Fundroi $fundroi,
        CustomerDetails $customerdetails,
        FundHoldings $fundholdings,
        DashboardRecordsInfo $dashboardrecordsinfo,
        Transcations $transcations,
        Customerfundposttran $customerfundposttran
    )
    {
      
        $this->fundBasicInfo = $fundBasicInfo;
        $this->fundInfo = $fundInfo;
        $this->fundPerformance = $fundPerformance;
        $this->fundclass = $fundclass;
        $this->fundproducts = $fundproducts;
        $this->fundrecord = $fundrecord;
        $this->customer = $customer;
        $this->fundroi = $fundroi;
        $this->customerdetails = $customerdetails;
        $this->fundholdings = $fundholdings;
        $this->dashboardrecordsinfo = $dashboardrecordsinfo;
        $this->transcations = $transcations;
        $this->customerfundposttran = $customerfundposttran;
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

      public function getWealthFundsDetails(Request $request)
   {
        $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
          'goalid' => 'required|string|max:100',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        //Get the nri elligbility and pass to getFundProducts
      $customerDetails = $this->customerdetails->getCustomerIsNRI($request['userid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);

      if($customerDetails)
      $nrielligble = $customerDetails['residential_status'];
      else
      $nrielligble = "";
      
      $fundclassassests = $this->dashboardrecordsinfo->getWealthAllocationAssets($getCustomerInfo['customerid'],$request['goalid']);
      // dd($fundclassassests);
      $fundAssets = array();
      foreach($fundclassassests as $key =>$value)
      {
        $goalsAssData = $this->dashboardrecordsinfo->getGoalsAllocationDetailsForFunds($getCustomerInfo['customerid'],$request['goalid'],$value['asset']);
     // dd($goalsAssData);
        $goalsAssetstypesData = $this->dashboardrecordsinfo->getWealthAllocationAssetstypes($getCustomerInfo['customerid'],$request['goalid'],$value['assettype']);
        // dd($goalsAssetstypesData);
      $fundclassData = $this->fundclass->getFundClassDataForWealth($goalsAssData['assettype'],$goalsAssetstypesData);
         // if($fundclassData)
          $assests['assettype'] = $value['assettype'];
         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['assetcategory'] = $value1['asset_category'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
            $limit = 5;
            if(!empty($request['fundclassid']))
            {
              if($request['fundclassid'] == $value1['fundclassid'])
              {
                $viewmore = "loadmore";
              $fundclassid = $request['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
              }/*
              else
              {
                $viewmore = "";
              $fundclassid = $value1['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
              }*/
              
            }
            else
            {
              $viewmore = "";
              $fundclassid = $value1['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
            }
           
           // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {
          
          //$reqData['defaultfund'] = $value2['fundid'];
          $reqData['fundid'] = $value2['fundid'];
          $reqData['goalid'] = $request['goalid'];
          $reqData['customerorderid'] = $orderstatus['customerorderid'];
         $checkFundStatus = $this->fundroi->checkCustomerSelectedFund($reqData);
         $checkData = $this->fundroi->checkCustomerFund($reqData);
         // dd($checkData);
          if($checkFundStatus)
          {
            $products['fundstatus'] = "checked";
          }
          else
          {
            if($checkData == "empty" && $key2 == 0)
         {
          // echo "hai";
          $products['fundstatus'] = "checked";
         }
         else
         {
              $products['fundstatus'] = "unchecked";          
         }
          }
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              $products['mininvestment'] = $value2['mininvt'];
              $products['sipmininvest'] = $value2['sipmininvest'];
              $products['AUM'] = number_format($value2['incret'],2);
              $products['oneM'] = number_format($value2['1monthret'],2);
              $products['sixM'] = number_format($value2['6monthret'],2);
              $products['oneY'] = number_format($value2['1yrret'],2);
              $products['threeY'] = number_format($value2['3yearet'],2);
              $products['fiveY'] = number_format($value2['5yearret'],2);
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         $assests['fundclass'] = $fundClass;
         // dd($assests);
         array_push($fundAssets, $assests);
      }
      return response()->json([
              'funds' => $fundAssets
          ], 200);
   }

     public function getFundsDetails(Request $request)
   {
        $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
          'goalid' => 'required|string|max:100',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        //Get the nri elligbility and pass to getFundProducts
      $customerDetails = $this->customerdetails->getCustomerIsNRI($request['userid']);
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
       $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);

      if($customerDetails)
      $nrielligble = $customerDetails['residential_status'];
      else
      $nrielligble = "";
      /*if($request['goal_wealth_type'] == "goal")
      {*/
      $fundclassassests = $this->fundclass->getFundClassAssestType();
     /* }
      else
      {
      $fundclassassests = $this->dashboardrecordsinfo->getWealthAllocationAssets($getCustomerInfo['customerid'],$request['goalid']);
      // dd($fundclassassests);
      }*/
      // dd($fundclassassests);
      $fundAssets = array();
      foreach($fundclassassests as $key =>$value)
      {
        $goalsAssData = $this->dashboardrecordsinfo->getGoalsAllocationForFunds($getCustomerInfo['customerid'],$request['goalid'],$value['assettype']);
        // dd($goalsAssData);
        // print_r($goalsAssData['asset']);
         
        /*if($request['goal_wealth_type'] == "goal")
      {*/
      $fundclassData = $this->fundclass->getFundClassData($goalsAssData['asset']);
     /* }
      else
      {
      $fundclassData = $this->fundclass->getFundClassDataForWealth($goalsAssData['asset']);
      }*/
         // if($fundclassData)
      // dd($fundclassData);
          $assests['assettype'] = $value['assettype'];
         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
            $limit = 5;
            if(!empty($request['fundclassid']))
            {
              if($request['fundclassid'] == $value1['fundclassid'])
              {
                $viewmore = "loadmore";
              $fundclassid = $request['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
              }/*
              else
              {
                $viewmore = "";
              $fundclassid = $value1['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
              }*/
              
            }
            else
            {
              $viewmore = "";
              $fundclassid = $value1['fundclassid'];
              $fundprodcutsData = $this->fundproducts->getFundProducts($fundclassid,$nrielligble,$limit,$viewmore);
            }
           
           // dd($fundprodcutsData);
         foreach($fundprodcutsData as $key2 => $value2)
         {
          
          //$reqData['defaultfund'] = $value2['fundid'];
          $reqData['fundid'] = $value2['fundid'];
          $reqData['goalid'] = $request['goalid'];
          $reqData['customerorderid'] = $orderstatus['customerorderid'];
         $checkFundStatus = $this->fundroi->checkCustomerSelectedFund($reqData);
         $checkData = $this->fundroi->checkCustomerFund($reqData);
         // dd($checkData);
          if($checkFundStatus)
          {
            $products['fundstatus'] = "checked";
          }
          else
          {
            if($checkData == "empty" && $key2 == 0)
         {
          // echo "hai";
          $products['fundstatus'] = "checked";
         }
         else
         {
              $products['fundstatus'] = "unchecked";          
         }
          }
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              $products['mininvestment'] = $value2['mininvt'];
              $products['sipmininvest'] = $value2['sipmininvest'];
              $products['AUM'] = number_format($value2['incret'],2);
              $products['oneM'] = number_format($value2['1monthret'],2);
              $products['sixM'] = number_format($value2['6monthret'],2);
              $products['oneY'] = number_format($value2['1yrret'],2);
              $products['threeY'] = number_format($value2['3yearet'],2);
              $products['fiveY'] = number_format($value2['5yearret'],2);
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

    public function getMutualFunds(Request $request)
   {
        $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        //Get the nri elligbility and pass to getFundProducts
      $customerDetails = $this->customerdetails->getCustomerIsNRI($request['userid']);
      if($customerDetails)
      $nrielligble = $customerDetails['residential_status'];
      else
      $nrielligble = "";

      $fundclassassests = $this->fundclass->getFundClassSubcategory();
      $fundAssets = array();
      // dd($fundclassassests);
      foreach($fundclassassests as $key =>$value)
      {
         $assests['assettype'] = $value['assettype'];
         $assests['assetname'] = $value['subcategory'];
         $fundclassData = $this->fundclass->getFundClassSubcategoryData($value['subcategory']);

         $fundClass = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
           $fundprodcutsData = $this->fundproducts->getFundProducts($value1['fundclassid'],$nrielligble,5,"");

         foreach($fundprodcutsData as $key2 => $value2)
         {
              //dd($value2);
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              $products['incdate'] = $value2['incdate'];
              $products['c_nav'] = $value2['c_nav'];
              $products['AUM'] = number_format($value2['incret'],2);
              $products['oneM'] = number_format($value2['1monthret'],2);
              $products['sixM'] = number_format($value2['6monthret'],2);
              $products['oneY'] = number_format($value2['1yrret'],2);
              $products['threeY'] = number_format($value2['3yearet'],2);
              $products['fiveY'] = number_format($value2['5yearret'],2);
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

   public function getCustomerSelectedProducts(Request $request)
   {
      $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:255',
          'goalid' => 'required|string|max:255',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
         // dd()
          $fundAssets = array();
          $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
          // dd($getCustomerInfo);
            if(isset($request['goal_wealth_type']))
            {
            /*  if($request['goal_wealth_type'] == "goal")
              {*/
                $fundassestsData = $this->fundclass->getCustomerSelectedAssests($getCustomerInfo['customerid'],$request['goalid']);
                // dd($fundassestsData);
              /*}
              else
              {
                $fundassestsData = $this->fundclass->getCustomerWealthSelectedAssests($getCustomerInfo['customerid'],$request['goalid']);
              }*/
            }
            $predata = $this->fundrecord->CheckLumpsumSipData($getCustomerInfo['customerid'],$request['goalid']);
          // dd($predata);
          if($fundassestsData)
          foreach($fundassestsData as $key => $value)
          {
             $assets['assettype'] = $value['assettype'];
            $fundclassData = $this->fundclass->getSelectedFundClassData($value['assettype']);
           // print_r($fundclassData);
         $fundClass = array();
          $assetsArray = array();
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            if($value1['subcategory'])
            $fund['subcategory'] = $value1['subcategory'];
            else
            $fund['subcategory'] = "subcategory";
            $fund['limit'] = "2";
            $fundProducts = array();
            $selectedProductsArray = array();
            $fundprodcutsData = $this->fundrecord->getCustomerSelectedProducts($getCustomerInfo['customerid'],$request['goalid'],$value['assettype']);
            // dd($fundprodcutsData);
               $goalsAssType = $this->dashboardrecordsinfo->getGoalsAllocationTypesDetails($getCustomerInfo['customerid'],$request['goalid']);
            $lumsiptype = array_column($goalsAssType, 'purchase_type');

            if(isset($request['goal_wealth_type']))
            {
              if($request['goal_wealth_type'] == "goal")
              {
                // echo 1;
            $goalsAssLumData = $this->dashboardrecordsinfo->getGoalsAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'L');
            // dd($goalsAssLumData);
            $goalsAssSipData = $this->dashboardrecordsinfo->getGoalsAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'S');
//fund values
            if($fundprodcutsData)
            {
                $fundprdtscount = (count($fundprodcutsData)/2);
                $fundlumvalue = round(($goalsAssLumData['asset_value']/$fundprdtscount),2);
            $fundsipvalue = round(($goalsAssSipData['asset_value']/$fundprdtscount),2);
              /*if($fundprdtscount)
              {
                //echo $value['']
                 $fundlumvalue = round(($goalsAssLumData['asset_value']/$fundprdtscount),2);
            $fundsipvalue = round(($goalsAssSipData['asset_value']/$fundprdtscount),2);
              }*/
            }
          
            $fund['Lumpsum_Amount'] = $goalsAssLumData['asset_value'];
            $fund['Sip_Amount'] = $goalsAssSipData['asset_value'];

              }
              else
              {
                /*$ProdData = $this->fundrecord->getWealthAssetsAllocationDetailsSipLumProducts($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'L');*/
            /*$goalsAssLumData = $this->dashboardrecordsinfo->getWealthAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'L');
            // dd($goalsAssLumData);
            $goalsAssSipData = $this->dashboardrecordsinfo->getWealthAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'S');
//fund values

            $fundprdtscount = (count($fundprodcutsData)/2);
            $fundlumvalue = round(($goalsAssLumData['asset_value']/$fundprdtscount),2);
            $fundsipvalue = round(($goalsAssSipData['asset_value']/$fundprdtscount),2);
            */

            $goalsAssLumData1 = $this->fundclass->getCustomerWealthSelectedAssestsSumAmount($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'L');
             // dd($goalsAssLumData1);
           $goalsAssLumSumData = array_sum(array_column($goalsAssLumData1, 'asset_value'));

           $fund['Lumpsum_Amount'] = $goalsAssLumSumData;
            $goalsAssSipData1 = $this->fundclass->getCustomerWealthSelectedAssestsSumAmount($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],'S');
            $goalsAssSipSumData = array_sum(array_column($goalsAssSipData1, 'asset_value'));
            $fund['Sip_Amount'] = $goalsAssSipSumData;
              }
            }

            
            // dd($fund['Sip_Amount']);
            $lumProductsArray = array();
            $sipProductsArray = array();
            // dd($fundprodcutsData);
            foreach ($fundprodcutsData as $key2 => $value2) {
              // dd($value2);
              if($request['goal_wealth_type'] == "wealth")
                {
                  $ProdData = $this->fundroi->getWealthAssetsAllocationDetailsSipLumProducts($getCustomerInfo['customerid'],$request['goalid'],$value2['asset'],'L');
                  // echo $value2['asset'];
                   $fundprdtscount = count($ProdData);
                $goalsAssLumData = $this->dashboardrecordsinfo->getWealthAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],$value2['asset'],'L');
            // dd($goalsAssLumData['asset_value']);
              $goalsAssSipData = $this->dashboardrecordsinfo->getWealthAssetsAllocationDetailsSipLum($getCustomerInfo['customerid'],$request['goalid'],$value['assettype'],$value2['asset'],'S');

              $fundlumvalue = round(($goalsAssLumData['asset_value']/$fundprdtscount),2);
            $fundsipvalue = round(($goalsAssSipData['asset_value']/$fundprdtscount),2);
            
                }
                // dd($goalsAssLumData);
              if($value2['purchasetype'] == "L" && $goalsAssLumData['lum_sip_type'] == "checked")
              {
                $fundvalueData = $this->fundrecord->getFundValue($getCustomerInfo['customerid'],$request['goalid'],$value2['fundid'],$value2['purchasetype']);
                // dd($fundvalueData);
                     if($fundvalueData)
                    {
                       /*$fundlumvalue = round(($goalsAssLumData['asset_value']/$fundprdtscount),2);*/
                       // $fundvalueData['lumpsumamount'];
                      if($fundvalueData['lumpsumamount'] != null && $fundvalueData['lumpsumamount'] != 0)
                      {
                          $fundlumvalue1 = $fundvalueData['lumpsumamount']; 
                      }
                      else
                      {
                       $fundlumvalue1 = $fundlumvalue;
                      }
                    }
                    /*else
                    {
                      $fundlumvalue1 = $fundlumvalue;
                    }*/
                    if($request['goal_wealth_type'] == "goal")
                     $fundproducts1['asset'] = $value['assettype'];
                    else
                     $fundproducts1['asset'] = $value2['asset'];
                   $fundproducts1['fundid'] = $value2['fundid'];
                    $fundproducts1['fundname'] = $value2['fundname'];
                    $fundproducts1['fundvalue'] = $fundlumvalue1;
                    $fundproducts1['purchasetype'] = $value2['purchasetype'];
                    $fundproducts1['sipamount'] = $value2['sipamount'];
                    $fundproducts1['sipmonthlydate'] = $value2['sipmonthlydate'];
                    $fundproducts1['sipduration'] = $value2['sipduration'];
                    $fundproducts1['sipunits'] = $value2['sipunits'];
                    $fundproducts1['lumpsumamount'] = $value2['lumpsumamount'];
                    $fundproducts1['lumpsumunits'] = $value2['lumpsumunits'];
                    $fundproducts1['transactionstatus'] = $value2['transactionstatus'];
               
                array_push($lumProductsArray, $fundproducts1);
                $reqData['lumpsumamount'] = $fundlumvalue1;
                $reqData1['fundid'] = $value2['fundid'];
                $reqData1['goalid'] = $request['goalid'];
                $reqData1['purchasetype'] = $value2['purchasetype'];
                $reqData1['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['lumpsumamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData,$reqData1);
              }
              elseif($value2['purchasetype'] == "S" && $goalsAssSipData['lum_sip_type'] == "checked")
              {
                $fundvalueData = $this->fundrecord->getFundValue($getCustomerInfo['customerid'],$request['goalid'],$value2['fundid'],$value2['purchasetype']);
               /* $fundsipvalue = round(($goalsAssSipData['asset_value']/$fundprdtscount),2);*/
                    if($fundvalueData)
                    {
                      // dd($goalsAssSipData['asset_value']);
                      if($fundvalueData['sipamount'] != null && $fundvalueData['sipamount'] != 0)
                      {
                          $fundsipvalue1 = $fundvalueData['sipamount']; 
                      }
                      else
                       $fundsipvalue1 = $fundsipvalue;
                    }
                    else
                    {
                      $fundsipvalue1 = $fundsipvalue;
                      // dd($fundprdtscount);
                    }
                    if($request['goal_wealth_type'] == "goal")
                    $fundproducts2['asset'] = $value['assettype'];
                    else
                     $fundproducts2['asset'] = $value2['asset'];

                    $fundproducts2['fundid'] = $value2['fundid'];
                    $fundproducts2['fundname'] = $value2['fundname'];
                    $fundproducts2['fundvalue'] = $fundsipvalue1;
                    $fundproducts2['purchasetype'] = $value2['purchasetype'];
                    $fundproducts2['sipamount'] = $value2['sipamount'];
                    $fundproducts2['sipmonthlydate'] = $value2['sipmonthlydate'];
                    $fundproducts2['sipduration'] = $value2['sipduration'];
                    $fundproducts2['sipunits'] = $value2['sipunits'];
                    $fundproducts2['lumpsumamount'] = $value2['lumpsumamount'];
                    $fundproducts2['lumpsumunits'] = $value2['lumpsumunits'];
                    $fundproducts2['transactionstatus'] = $value2['transactionstatus'];
                    array_push($sipProductsArray, $fundproducts2);
                    $reqData2['sipamount'] = $fundsipvalue1;
                $reqData3['fundid'] = $value2['fundid'];
                $reqData3['goalid'] = $request['goalid'];
                $reqData3['purchasetype'] = $value2['purchasetype'];
                $reqData3['customerid'] = $getCustomerInfo['customerid'];
                if(empty($value2['sipamount']))
               $fundUpdate = $this->fundroi->updateCustomerFundValue($reqData2,$reqData3);
              }
               if(in_array("L", $lumsiptype))
              {
                $fundproductsArr['Lumpsum'] = $lumProductsArray;
              }
              else
              {
                $fundproductsArr['Lumpsum'] = array();
              }
              if(in_array("S", $lumsiptype))
              {
                $fundproductsArr['Sip'] = $sipProductsArray;
              }
              else
              {
                $fundproductsArr['Sip'] = array();
              }
           
            }
            
            array_push($selectedProductsArray, $fundproductsArr);
            $fund['fundslist'] = $selectedProductsArray;
            array_push($assetsArray, $fund);
          }
          $assests['fundclass'] = $assetsArray;
         array_push($fundAssets, $assests);
          }
           
      return response()->json([
              'selectedProducts' => $fundAssets
          ], 200);
   }

   public function getCustomerOrderDetails(Request $request)
   {

          $validator = Validator::make($request->json()->all(), [
          'goalid' => 'required|string|max:100',
          'userid' => 'required|string|max:255',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
            $goalid = $request['goalid'];
            // Lumpsum Amount 
            $purchasetype = "L";
            $selectedProductsArray = array();
             $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
              $goalsAssType = $this->dashboardrecordsinfo->getGoalsAllocationTypesDetails($getCustomerInfo['customerid'],$request['goalid']);
            $lumsiptype = array_column($goalsAssType, 'purchase_type');
            $fundprodcutsData = $this->fundrecord->getCustomerOrderSummary($getCustomerInfo['customerid'],$goalid,$purchasetype);
            // dd($fundprodcutsData);
            foreach ($fundprodcutsData as $key1 => $value1) {
                    $fundproducts['fundid'] = $value1['fundid'];
                    $fundproducts['fundname'] = $value1['fundname'];
                    $fundproducts['purchasetype'] = $value1['purchasetype'];
                    $fundproducts['fundvalue'] = $value1['lumpsumamount'];
                    $fundproducts['lumpsumunits'] = $value1['lumpsumunits'];
                    $fundproducts['transactionstatus'] = $value1['transactionstatus'];
                    $fundproducts['assettype'] = $value1['assettype'];
                    array_push($selectedProductsArray, $fundproducts);
            }
            $amount = array_sum(array_column($selectedProductsArray, 'fundvalue'));
            
            if(in_array("L", $lumsiptype))
              {
                if($goalsAssType[0]['lum_sip_type'] != "")
                {  
                $lumpsumamount['Lumpsum_Amount'] = $amount;
                $lumpsumamount['Lumpsum'] = $selectedProductsArray;
                }
                else
                {
                  $lumpsumamount['Lumpsum_Amount'] = [];
                  $lumpsumamount['Lumpsum'] = [];
                }
              }
              else
              {
                $lumpsumamount['Lumpsum_Amount'] = [];
                $lumpsumamount['Lumpsum'] = [];
              }
              
            // Sip Amount 
            $purchasetype = "s";
            $selectedProductsArray1 = array();
            $fundprodcutsData1 = $this->fundrecord->getCustomerOrderSummary($getCustomerInfo['customerid'],$goalid,$purchasetype);
            foreach ($fundprodcutsData1 as $key1 => $value1) {
                    $fundproducts1['fundid'] = $value1['fundid'];
                    $fundproducts1['fundname'] = $value1['fundname'];
                    $fundproducts1['purchasetype'] = $value1['purchasetype'];
                    $fundproducts1['sipamount'] = $value1['sipamount'];
                    $fundproducts1['sipmonthlydate'] = $value1['sipmonthlydate'];
                    $fundproducts1['sipduration'] = $value1['sipduration'];
                    $fundproducts1['sipunits'] = $value1['sipunits'];
                    $fundproducts1['transactionstatus'] = $value1['transactionstatus'];
                    $fundproducts1['assettype'] = $value1['assettype'];
                    array_push($selectedProductsArray1, $fundproducts1);
            }
            $amount1 = array_sum(array_column($selectedProductsArray1, 'sipamount'));
            
            if(in_array("S", $lumsiptype))
              {
                if($goalsAssType[1]['lum_sip_type'] != "")
                {
                  $lumpsumamount['Sip_Amount'] = $amount1;
                  $lumpsumamount['Sip'] = $selectedProductsArray1;
                }
                else
                {  
                $lumpsumamount['Sip_Amount'] = [];
                $lumpsumamount['Sip'] = [];
                }
              }
              else
              {
                $lumpsumamount['Sip_Amount'] = [];
                $lumpsumamount['Sip'] = [];
              }
      return response()->json([
              'orderdetails' => $lumpsumamount
          ], 200);
   }

public function getCustomerGoalsOrderDetails(Request $request)
   {
    $goalsFundsArr = array();
        $customerGoals = $request->json()->all();
    foreach ($customerGoals as $keys => $values) {
          $validator = Validator::make($values, [
          'userid' => 'required|string|max:255',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
       $getCustomerInfo = $this->customer->getUserDetailsrow($values['userid']);
      $GoalsData = $this->fundrecord->getCustomerGoalsList($getCustomerInfo['customerid'],$values['goalid']);
      // dd($GoalsData);
      $goalsArr = array();
        foreach ($GoalsData as $key => $value) {
            $goals['goalid'] = $value['customergoalid'];
            $goals['goalpriority'] = $value['goalpriority'];
            $goalid = $value['customergoalid'];

            // Lumpsum Amount 
            $purchasetype = "L";
            $selectedProductsArray = array();
            $fundprodcutsData = $this->fundrecord->getCustomerOrderSummary($getCustomerInfo['customerid'],$goalid,$purchasetype);
            foreach ($fundprodcutsData as $key1 => $value1) {
                    $fundproducts['fundid'] = $value1['fundid'];
                    $fundproducts['fundname'] = $value1['fundname'];
                    $fundproducts['purchasetype'] = $value1['purchasetype'];
                    $fundproducts['fundvalue'] = $value1['lumpsumamount'];
                    $fundproducts['lumpsumunits'] = $value1['lumpsumunits'];
                    $fundproducts['transactionstatus'] = $value1['transactionstatus'];
                    array_push($selectedProductsArray, $fundproducts);
            }
            $amount = array_sum(array_column($selectedProductsArray, 'fundvalue'));
            $lumpsumamount['Lumpsum_Amount'] = $amount;
            $lumpsumamount['Lumpsum'] = $selectedProductsArray;

            // Sip Amount 
            $purchasetype = "s";
            $selectedProductsArray1 = array();
            $fundprodcutsData1 = $this->fundrecord->getCustomerOrderSummary($getCustomerInfo['customerid'],$goalid,$purchasetype);
            foreach ($fundprodcutsData1 as $key1 => $value1) {
                    $fundproducts1['fundid'] = $value1['fundid'];
                    $fundproducts1['fundname'] = $value1['fundname'];
                    $fundproducts1['purchasetype'] = $value1['purchasetype'];
                    $fundproducts1['sipamount'] = $value1['sipamount'];
                    $fundproducts1['sipmonthlydate'] = $value1['sipmonthlydate'];
                    $fundproducts1['sipduration'] = $value1['sipduration'];
                    $fundproducts1['sipunits'] = $value1['sipunits'];
                    $fundproducts1['transactionstatus'] = $value1['transactionstatus'];
                    array_push($selectedProductsArray1, $fundproducts1);
            }
            $amount1 = array_sum(array_column($selectedProductsArray1, 'sipamount'));
            $lumpsumamount['Sip_Amount'] = $amount1;
            $lumpsumamount['Sip'] = $selectedProductsArray1;
            $goals['Goals'] = $lumpsumamount;
         array_push($goalsArr, $goals);
          }
          array_push($goalsFundsArr, $goalsArr);
        }
      return response()->json([
              'orderdetails' => $goalsFundsArr
          ], 200);
   }

    public function CustomerFundSelection(Request $request)
   {
      $fundselection = $request->json()->all();
       $getCustomerInfo = $this->customer->getUserDetailsrow($fundselection[0]['userid']);
     $fundaddedData = $this->fundroi->getAddedFunds($getCustomerInfo['customerid'],$fundselection[0]['customergoalid']);
      $fundaddedDataCount = count($fundaddedData);
      $fundselectionCount = count($fundselection);
    $removeFundsArr = "";
    if($fundselectionCount != $fundaddedDataCount)
    {
      // dd($removeFundsArr);
      $fundaddedData = $this->fundroi->RemoveCustomerFunds($getCustomerInfo['customerid'],$fundselection[0]['customergoalid'],$removeFundsArr);
    }

      foreach ($fundselection as $key => $value) {
        // print_r($value);
        $validator = Validator::make($value, [
          'userid' => 'required|string|max:100',
          'orderdate' => 'required|string|max:255',
          'fundid' => 'required|string|max:255',
          'orderstatus' => 'required|string|max:255',
          'customergoalid' => 'required|string|max:100',
          'purchasetype' => 'required|string|max:100',
          'startdate' => 'required|string|max:255'
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      
      $checkFund = $this->fundrecord->CheckFundExists($getCustomerInfo['customerid'],$value['customergoalid'],$value['fundid']);
     // dd($checkFund);
        $purchaseArr = array("L","S");
      if(empty($checkFund))
      {
        // echo 1;
        // dd($checkFund);
        // echo $getCustomerInfo['customerid'];
      $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
      if($orderstatus)
      {
          $reqData1['fundid'] = $value['fundid'];
          $reqData1['purchasetype'] = $value['purchasetype'];
          $reqData1['customergoalid'] = $value['customergoalid'];
          $reqData1['startdate'] = $value['startdate'];
          $reqData1['createdutcdatetime'] = Carbon::now();
          $reqData1['modifiedutcdatetime'] = Carbon::now();
          foreach ($purchaseArr as $key1 => $value1) {
         /*$reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);*/
         $reqData1['customerorderid'] = $orderstatus['customerorderid'];
         $reqData1['purchasetype'] = $value1;
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
        }
      }
      else
      {
        // dd(223);
      $reqData['customerid'] = $getCustomerInfo['customerid'];
      $reqData['orderdate'] = $value['orderdate'];
      $reqData['orderno'] = "3658663575".mt_rand(10,100);
      $reqData['customerorderid'] = "FJ456-SSD5-DDDD-FDGJ-DDSF-KJSDDF3575".mt_rand(10,100);
      $reqData1['fundid'] = $value['fundid'];
      
      $reqData['orderstatus'] = $value['orderstatus'];
      $reqData1['customergoalid'] = $value['customergoalid'];
      $reqData1['startdate'] = $value['startdate'];
      $reqData1['createdutcdatetime'] = Carbon::now();
      $reqData1['modifiedutcdatetime'] = Carbon::now();
     
      $fundselectionData = $this->fundrecord->InsertCustomerOrderPretran($reqData);
      //dd($fundselectionData);
      if($fundselectionData == 0 || $fundselectionData)
      {
          $reqData1['customerorderid'] = $reqData['customerorderid'];
          // dd($purchaseArr);
           foreach ($purchaseArr as $key1 => $value1) {
            // echo $value1;
           //$reqData2['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100000);
          $reqData1['purchasetype'] = $value1;
          // $reqData1['orderdetailid'] = $reqData2['orderdetailid'];
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
        }
      }

      }
     $status = "fund selection added Successfully";
     }
     /*else
     {
      $status = "Fund Already Exists";
     }*/
   }
   if(empty($status))
   {
     $status = "fund selection added Successfully";
   }
   return response()->json([
              'fundselection' => $status
          ], 200);
    }

    public function getFundProductsById(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
          'fundid' => 'required|string|max:100',
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $nrielligble = "1";
$funddet = $this->fundproducts->getFundProductsDetails($request['fundid'],$nrielligble);
$fundHoldings = $this->fundholdings->getFundHoldings($request['fundid']);
// dd($funddet);
        $fundDetails = array();

        $basicArray = array();
        $basicinfo['fund_name'] = $funddet['fundname'];
        $basicinfo['scheme_name'] = $funddet['s_name'];
        $basicinfo['category'] = $funddet['category'];
        $basicinfo['fund_manager'] = $funddet['fundmanager'];
        $basicinfo['net_aum'] = $funddet['aum'].' Cr';
        $basicinfo['return_detail'] = "Return Detail";
        array_push($basicArray,$basicinfo);
        $basicinfoArray['BasicInfo'] = $basicArray;
        array_push($fundDetails,$basicinfoArray);


        $returnArray = array();
        $returndetails['YTD'] = "YTD";
        $returndetails['sixmonths'] = number_format($funddet['6monthret'],2).' %';
        $returndetails['oneyear'] = number_format($funddet['1yrret'],2).' %';
        $returndetails['threeyear'] = number_format($funddet['3yearet'],2).' %';
        array_push($returnArray,$returndetails);
        $returndetailsArray['ReturnDetails'] = $returnArray;
        array_push($fundDetails,$returndetailsArray);

        $ratiosArray = array();
        $ratios['standard_deviation'] = $funddet['standarddeviation'];
        $ratios['beta'] = $funddet['beta'];
        $ratios['alpha'] = $funddet['alpha'];
        $ratios['r_squared'] = $funddet['standarddeviation'];
        $ratios['shapre'] = $funddet['sharpe'];
        $ratios['portfolio_turnover'] = $funddet['portfolioratio'];
        $ratios['expense_ratio'] = $funddet['expenseratio'];
        array_push($ratiosArray,$ratios);
        $ratiosdetailsArray['Ratios'] = $ratiosArray;
        array_push($fundDetails,$ratiosdetailsArray);

        $navDetailsArray = array();
        $navdetails['nav_price'] = number_format($funddet['nav'],2);
        $navdetails['nav_date'] = $funddet['navdate'];
        $navdetails['max_entry_load'] = $funddet['entryload'];
        $navdetails['max_exit_load'] = $funddet['exitload'];
        $navdetails['week_high'] = $funddet['52weekhhigh'];
        $navdetails['week_low'] = $funddet['52weeklow'];
        $navdetails['minimum_investment'] = $funddet['mininvestment'];
        $navdetails['minimum_topup'] = $funddet['mintopup'];
        $navdetails['maximum_topup'] = "Maximum Topup";
        $navdetails['SIP'] = $funddet['sip'];
        $navdetails['STP'] = $funddet['stp'];
        $navdetails['SIP_dates'] = "SIP Dates";
        array_push($navDetailsArray,$navdetails);
        $navdetailsArray['NavDetails'] = $navDetailsArray;
        array_push($fundDetails,$navdetailsArray);

        $holdingstocksArray = array();
        $holdingsData = array("one","two","three","four","five","six","seven","eight","nine","ten");
        if($fundHoldings)
        {
        foreach ($fundHoldings as $key => $value) {
          $hold = $holdingsData[$key];
           $holds[$hold] = $value['compname'];
            
        }
        array_push($holdingstocksArray,$holds);
      }
      else
      {
        $holdingstocksArray = array();
      }
        
        $holdingstockArray['HoldingStocks'] = $holdingstocksArray;
        array_push($fundDetails,$holdingstockArray);



         return response()->json([
              'fundDetails' => $fundDetails
          ], 200);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function mutualfundsSearch(Request $request)
    {
        // dd($request->all());
              $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100',
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
        $reqData['category'] = $request['category'];
        $reqData['subcategory'] = $request['subcategory'];
        $reqData['fundhouse'] = $request['fundhouse'];
        $searchfundData = $this->fundclass->getSearchedMutualFundData($reqData);
        $searchArray = array();
        foreach ($searchfundData as $key => $value2) {
              $products['fundclassid'] = $value2['fundclassid'];
              $products['name'] = $value2['name'];
              $products['fundname'] = $value2['fundname'];
              $products['assettype'] = $value2['assettype'];
              $products['fundid'] = $value2['fundid'];
              $products['AUM'] = number_format($value2['AUM'],2);
              $products['onem'] = number_format($value2['onem'],2);
              $products['sixm'] = number_format($value2['sixm'],2);
              $products['oney'] = number_format($value2['oney'],2);
              $products['threey'] = number_format($value2['threey'],2);
              $products['fivey'] = number_format($value2['fivey'],2);
              $products['c_nav'] = $value2['c_nav'];
              $products['incdate'] = $value2['incdate'];
              array_push($searchArray, $products);
        }
        $searchResultArray = $searchArray;
        return response()->json([
              'fundDetails' => $searchResultArray
          ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function customerFundsUpdate(Request $request)
    {
      $fundsData = $request->json()->all();
      foreach ($fundsData as $key => $value) {
        
         $validator = Validator::make($value, [
          'userid' => 'required|string|max:100',
          'goalid' => 'required|string|max:100',
          'fundid' => 'required|string|max:100',
          'purchasetype' => 'required|string|max:100',
          'fundvalue' => 'required|string|max:100',
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);
      $getCustomerOrder = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
        $reqData['customerorderid'] = $getCustomerOrder['customerorderid'];
        $reqData['goalid'] = $value['goalid'];
        $reqData['fundid'] = $value['fundid'];
        $reqData['purchasetype'] = $value['purchasetype'];
        if($value['purchasetype'] == "l" || $value['purchasetype'] == "L")
        $reqData1['lumpsumamount'] = $value['fundvalue'];
        else
        $reqData1['sipamount'] = $value['fundvalue'];
      // dd($reqData1);
    $fundDetailsUpd = $this->fundroi->updateCustomerFundDetails($reqData1,$reqData);
    // dd($fundDetailsUpd);
  }
    if($fundDetailsUpd || $fundDetailsUpd == 0)
    {
      return response()->json([
              'status' => "Fund Details Updated Successfully"
          ], 200);
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundBasicInfo  $fundBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function UserCheckoutSummary(Request $request)
    {
      $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100'
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
      $getCustomerOrder = $this->fundrecord->CheckoutCustomerOrderStatus($getCustomerInfo['customerid']);
      if($getCustomerOrder)
      {
        $status = "Checkout Summary Successfully";
      }
      else
      {
        $status = "Checkout Summary Failed";
      }
      return response()->json([
              'status' => $status
          ], 200);
    }

        public function AddTranscationDataToPostTable(Request $request)
    {
      $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:100'
            ]);
      
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
      $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
      $getCustomerOrder = $this->transcations->getCustomerTranscationDetails($getCustomerInfo['customerid']);
      foreach($getCustomerOrder as $key =>$value)
      {
        $custpost['customerid'] = $value['customerid'];
        $custpost['customergoalid'] = $value['customergoalid'];
        $custpost['fundid'] = $value['fundid'];
        $custpost['startdate'] = $value['startdate'];
        $custpost['orderno'] = $value['orderno'];

        $getCustomerFund = $this->customerfundposttran->AddCustomerOrderPost($custpost);
        if($getCustomerFund)
        {
          $custpostdata['customerfundid'] = $getCustomerFund;
          $custpostdata['customerid'] = $value['customerid'];
          $custpostdata['purchasetype'] = $value['purchasetype'];
          $custpostdata['startdate'] = $value['startdate'];
          $custpostdata['sipamount'] = $value['sipamount'];
          $custpostdata['sipmonthlydate'] = $value['sipmonthlydate'];
          $custpostdata['sipduration'] = $value['sipduration'];
          $custpostdata['lumpsumamount'] = $value['lumpsumamount'];
          $getCustomerFunddata = $this->fundInfo->InsertCustomerFundDataPostTran($custpostdata);
          if($getCustomerFunddata)
          {
            $custpostdetail['customerfundid'] = $getCustomerFund;
            $custpostdetail['funddataid'] = $getCustomerFunddata;
            $custpostdetail['customerid'] = $value['customerid'];
            $custpostdetail['fundid'] = $value['fundid'];
            $custpostdetail['purchasetype'] = $value['purchasetype'];
            $custpostdetail['transactiondate'] = $value['trxndate'];
            $custpostdetail['units'] = $value['units'];
            $custpostdetail['purchasenavvalue'] = $value['nav'];
            $custpostdetail['purchasevalue'] = $value['amount'];
            $custpostdetail['investmentamount'] = $value['amount'];
            $custpostdetail['transactionstatus'] = "completed";
            $custpostdetail['customergoalid'] = $value['customergoalid'];
            $custpostdetail['folionumber'] = $value['folio'];
            $getCustomerFunddetail = $this->fundPerformance->InsertCustomerFundDetailPostTran($custpostdetail);
          }
        }
      }

      if($getCustomerFunddetail)
      {
        $status = "Post Data Added Successfully";
      }
      else
      {
        $status = "Post Data Added Failed";
      }
      return response()->json([
              'status' => $status
          ], 200);
    }

        public function FundRanking()
    {
      $fundclassIds = $this->fundproducts->getFundClassIds();
      // dd($fundclassIds);
      foreach($fundclassIds as $key =>$value)
      {
         // echo $value['assettype'];
        if($value['assettype'] == "Equity")
        {  
        $fundprdts = $this->fundproducts->getFundProductsByClassId($value['fundclassid']);
        }
        elseif($value['assettype'] == "Debt")
        {
          if($value['asset_category'] == "Debt Long")
          {
        $fundprdts = $this->fundproducts->getFundProductsByClassDebtLong($value['fundclassid']);
          }
          elseif ($value['asset_category'] == "Debt Medium") {
            # code...
        $fundprdts = $this->fundproducts->getFundProductsByClassDebtMedium($value['fundclassid']);  
          }
        }
        elseif($value['asset_category'] == "Liquid")
        {
        $fundprdts = $this->fundproducts->getFundProductsByClassLiquid($value['fundclassid']);  
        }
        elseif($value['assettype'] == "Gold")
        {
        $fundprdts = $this->fundproducts->getFundProductsByClassId($value['fundclassid']);  
        }

        foreach($fundprdts as $key1 =>$value1)
        {
           $fundid['fundid'] = $value1['fundid'];
           $fundrank['rank'] = $key1+1;
           // dd($funddata['fundid']);
          $fundrankingUpd = $this->fundproducts->FundRankingUpdate($fundrank,$fundid);
        }
             /* if($fundrankingUpd==0)
      {
        return response()->json([
              'status' => "success"
          ], 200);
      }*/
      }

    }
}
