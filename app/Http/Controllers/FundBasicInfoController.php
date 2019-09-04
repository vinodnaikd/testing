<?php

namespace App\Http\Controllers;

use App\Models\FundBasicInfo;
use App\Models\FundInfo;
use App\Models\FundPerformance;
use App\Models\FundRecord;
use App\Models\FundClass;
use App\Models\Customer;
use App\Models\FundProducts;
use App\Models\Fundroi;
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
        Fundroi $fundroi
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
    
    public function getMutualFunds()
   {
        
        //Get the nri elligbility and pass to getFundProducts
      $nrielligble = "1";
      $fundclassassests = $this->fundclass->getFundClassAssestType();
      $fundAssets = array();
      foreach($fundclassassests as $key =>$value)
      {
         //$assests['assettype'] = $value['assettype'];
         $fundclassData = $this->fundclass->getFundClassData($value['assettype']);
         
          //print_r(count($fundclassData));
         $fundClass = array();
         if($fundclassData)
         foreach($fundclassData as $key1 => $value1)
         {
            $fund['fundclassid'] = $value1['fundclassid'];
            $fund['name'] = $value1['name'];
            $fund['assettype'] = $value1['assettype'];
            $fund['category'] = $value1['category'];
            $fund['subcategory'] = $value1['subcategory'];

            $fundProducts = array();
           $fundprodcutsData = $this->fundproducts->getFundProducts($value1['fundclassid'],$nrielligble);

         foreach($fundprodcutsData as $key2 => $value2)
         {
              //dd($value2);
              $products['fundid'] = $value2['fundid'];
              $products['fundname'] = $value2['fundname'];
              $products['amccode'] = $value2['amccode'];
              $products['AUM'] = number_format($value2['incret'],2);
              $products['onem'] = number_format($value2['1monthret'],2);
              $products['sixm'] = number_format($value2['6monthret'],2);
              $products['oney'] = number_format($value2['1yrret'],2);
              $products['threey'] = number_format($value2['3yearet'],2);
              $products['fivey'] = number_format($value2['5yearret'],2);
              $products['c_nav'] = $value2['c_nav'];
              $products['incdate'] = $value2['incdate'];
              array_push($fundProducts, $products);
         }
              $fund['fundproducts'] = $fundProducts;
            array_push($fundClass, $fund);
         }
         //if($fundClass)
         $assests['fundclass'] = $fundClass;
         array_push($fundAssets, $assests);
      }
      return response()->json([
              'funds' => $fundAssets
          ], 200);
   }

   public function getCustomerSelectedProducts()
   {
      $validator = Validator::make($request->json()->all(), [
          'userid' => 'required|string|max:255',
            ]);
      if($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'messages' => $validator->messages()
          ], 400);
      }
          $fundassestData = $this->fundclass->getCustomerSelectedAssests();
          $assetsArray = array();
          foreach($fundassestData as $key => $value)
          {
            $assets['assettype'] = $value['assettype'];
            $selectedProductsArray = array();
            $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
            $fundprodcutsData = $this->fundrecord->getCustomerSelectedProducts($getCustomerInfo['customerid']);
            foreach ($fundprodcutsData as $key1 => $value1) {
                    $fundproducts['fundid'] = $value1['fundid'];
                    $fundproducts['fundname'] = $value1['fundname'];
                    $fundproducts['purchasetype'] = $value1['purchasetype'];
                    $fundproducts['sipamount'] = $value1['sipamount'];
                    $fundproducts['sipmonthlydate'] = $value1['sipmonthlydate'];
                    $fundproducts['sipduration'] = $value1['sipduration'];
                    $fundproducts['sipunits'] = $value1['sipunits'];
                    $fundproducts['lumpsumamount'] = $value1['lumpsumamount'];
                    $fundproducts['lumpsumunits'] = $value1['lumpsumunits'];
                    $fundproducts['transactionstatus'] = $value1['transactionstatus'];
                    array_push($selectedProductsArray, $fundproducts);
            }
            $assets['fundslist'] = $selectedProductsArray;
            array_push($assetsArray, $assets);
          }
           
      return response()->json([
              'selectedProducts' => $assetsArray
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
            $fundprodcutsData = $this->fundrecord->getCustomerOrderSummary($getCustomerInfo['customerid'],$goalid,$purchasetype);
            foreach ($fundprodcutsData as $key1 => $value1) {
                    $fundproducts['fundid'] = $value1['fundid'];
                    $fundproducts['fundname'] = $value1['fundname'];
                    $fundproducts['purchasetype'] = $value1['purchasetype'];
                    $fundproducts['lumpsumamount'] = $value1['lumpsumamount'];
                    $fundproducts['lumpsumunits'] = $value1['lumpsumunits'];
                    $fundproducts['transactionstatus'] = $value1['transactionstatus'];
                    array_push($selectedProductsArray, $fundproducts);
            }
            $amount = array_sum(array_column($selectedProductsArray, 'lumpsumamount'));
            $lumpsumamount['Lumpsum Amount'] = $amount;
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
            $lumpsumamount['Sip Amount'] = $amount1;
            $lumpsumamount['Sip'] = $selectedProductsArray1;
      return response()->json([
              'orderdetails' => $lumpsumamount
          ], 200);
   }

    public function CustomerFundSelection(Request $request)
   {
      $fundselection = $request->json()->all();
      foreach ($fundselection as $key => $value) {
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
      
      $getCustomerInfo = $this->customer->getUserDetailsrow($value['userid']);

      $orderstatus = $this->fundrecord->CheckCustomerOrderStatus($getCustomerInfo['customerid']);
      if($orderstatus)
      {
        //dd($orderstatus);
          $reqData1['fundid'] = $value['fundid'];
          $reqData1['purchasetype'] = $value['purchasetype'];
          $reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
          $reqData1['customerorderid'] = $orderstatus['customerorderid'];
          $reqData1['customergoalid'] = $value['customergoalid'];
          $reqData1['startdate'] = $value['startdate'];
          $reqData1['createdutcdatetime'] = Carbon::now();
          $reqData1['modifiedutcdatetime'] = Carbon::now();
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
      }
      else
      {

      $reqData['customerid'] = $getCustomerInfo['customerid'];
      $reqData['orderdate'] = $value['orderdate'];
      $reqData['orderno'] = "65656565365";
      $reqData['customerorderid'] = "FJ456-SSD5-DDDD-FDGJ-DDSF-KJSDDF3575".mt_rand(10,100);
      $reqData1['fundid'] = $value['fundid'];
      $reqData1['purchasetype'] = $value['purchasetype'];
      $reqData['orderstatus'] = $value['orderstatus'];
      $reqData1['customergoalid'] = $value['customergoalid'];
      $reqData1['startdate'] = $value['startdate'];
      $reqData1['createdutcdatetime'] = Carbon::now();
      $reqData1['modifiedutcdatetime'] = Carbon::now();

      $fundselectionData = $this->fundrecord->InsertCustomerOrderPretran($reqData);
      if($fundselectionData == 0)
      {
        
          $reqData1['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-KJSDF35675".mt_rand(10,100);
          $reqData1['customerorderid'] = $reqData['customerorderid'];
          $fundselectionDetailsData = $this->fundroi->InsertCustomerOrderDetailsPretran($reqData1);
      }

      }
     }
    }

    public function getFundProductsById(Request $request)
    {
        $fundDetails = array();


        $basicArray = array();
        $basicinfo['fund_name'] = "Birla SL Tax Plan (D)";
        $basicinfo['scheme_name'] = "Scheme Name";
        $basicinfo['category'] = "Category";
        $basicinfo['fund_manager'] = "Fund manager";
        $basicinfo['net_aum'] = "Net AUM";
        $basicinfo['return_detail'] = "Return Detail";
        array_push($basicArray,$basicinfo);
        $basicinfoArray['BasicInfo'] = $basicArray;
        array_push($fundDetails,$basicinfoArray);


        $returnArray = array();
        $returndetails['fund_name'] = "YTD";
        $returndetails['scheme_name'] = "6 months";
        $returndetails['category'] = "1 year";
        $returndetails['fund_manager'] = "3 year";
        array_push($returnArray,$returndetails);
        $returndetailsArray['ReturnDetails'] = $returnArray;
        array_push($fundDetails,$returndetailsArray);

        $ratiosArray = array();
        $ratios['standard_deviation'] = "YTD";
        $ratios['beta'] = "Beta";
        $ratios['alpha'] = "Alpha";
        $ratios['r_squared'] = "R-Squared";
        $ratios['shapre'] = "shapre";
        $ratios['portfolio_turnover'] = "Portfolio Turnover";
        $ratios['expense_ratio'] = "Expense Ratio";
        array_push($ratiosArray,$ratios);
        $ratiosdetailsArray['Ratios'] = $ratiosArray;
        array_push($fundDetails,$ratiosdetailsArray);

        $navDetailsArray = array();
        $navdetails['nav_price'] = "Nav Price";
        $navdetails['nav_date'] = "Nav Date";
        $navdetails['max_entry_load'] = "Max Entry Load";
        $navdetails['max_exit_load'] = "Max Exit Load";
        $navdetails['week_high'] = "52 Week High";
        $navdetails['week_low'] = "52 Week Low";
        $navdetails['minimum_investment'] = "Minimum Investment";
        $navdetails['minimum_topup'] = "Minimum Topup";
        $navdetails['maximum_topup'] = "Maximum Topup";
        $navdetails['SIP'] = "SIP (yes/no)";
        $navdetails['STP'] = "STP (yes/no)";
        $navdetails['SIP_dates'] = "SIP Dates";
        array_push($navDetailsArray,$navdetails);
        $navdetailsArray['NavDetails'] = $navDetailsArray;
        array_push($fundDetails,$navdetailsArray);

        $holdingstocksArray = array();
        $holdingstock['one'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['two'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['three'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['four'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['five'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['six'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['seven'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['eight'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['nine'] = "Reliance Income Fund - Direct (G)";
        $holdingstock['ten'] = "Reliance Income Fund - Direct (G)";
        
        array_push($holdingstocksArray,$holdingstock);
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
