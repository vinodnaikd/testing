<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::post('/v1/users/register', 'JWTAuthController@register')->name('api.jwt.register');
//Route::post('/v1/users/login', 'JWTAuthController@login')->name('api.jwt.login');

//Route::post('/register', 'AuthController@register');
 //Route::group(['middleware' => ['api']], function() {
//Route::post('/login', 'AuthController@login');
// });

//Route::get('unauthorized', function() {
//    return response()->json([
//        'status' => 'error',
//        'message' => 'Unauthorized'
//    ], 401);
//})->name('api.jwt.unauthorized');
//
//Route::group(['middleware' => 'auth:api'], function(){
//Route::post('/logout', 'AuthController@logout');
//Route::post('db', 'AllocateEquitytableController@index');

//Route::group(['middleware' => 'auth:api'], function() { 

     //User Routes
//Route::post('signup', 'UserProfileController@show');
Route::post('/v1/users/signup', 'UserProfileController@signUp');
//Route::post('/v1/users/register', 'UserProfileController@Register');
Route::post('/v1/users/signin', 'UserProfileController@signIn');
Route::post('/v1/users/register_new', 'UserController@signup');
Route::post('/v1/users/login', 'UserController@login');


/*Route::get('unauthorized', function() {
    return response()->json([
        'status' => 'error',
        'message' => 'Unauthorized'
    ], 401);
})->name('api.jwt.unauthorized');*/
// Route::middleware('jwt.auth')->get('users', function(Request $request) {

//Main JWT
  // Route::group(['middleware' => 'jwt.auth'], function(){
// End JWT
    Route::post('/v1/users/register', 'UserProfileController@Register');
    Route::post('/v1/users/registerdata', 'UserProfileController@RegisterData');
     Route::post('/v1/users/getregisterdetails', 'UserProfileController@getRegistraionDetails');
     // Jwt Authentication
 // Route::group(['middleware' => ['jwt.verify']], function() {
//Bank Routes
   // Route::get('/v1/users/reports/getquestions', 'QuestionController@show');

Route::post('/v1/users/getbanklist', 'BankController@show');
Route::post('/v1/users/addbank', 'BankController@store');
Route::post('/v1/users/editbank', 'BankController@edit');
Route::post('/v1/users/removbank', 'BankController@destroy');
    //End Of Routes

//Nominee Routes
Route::post('/v1/users/getnominee', 'NomineeController@show');
Route::post('/v1/users/addnominee', 'NomineeController@store');
Route::post('/v1/users/removenominee', 'NomineeController@removeNominee');
Route::post('/v1/users/changeaddress', 'UserProfileController@changeAddress');

Route::get('/v1/users/signout', 'UserProfileController@signOut');

Route::post('/v1/users/forgotpassword', 'UserProfileController@forgotPassword');
Route::post('/v1/users/resetpassword', 'UserProfileController@resetPassword');
Route::post('/v1/users/changepassword', 'UserProfileController@changePassword');
Route::post('/v1/users/settranscationpassword', 'UserProfileController@setTranscationPassword');
Route::get('/v1/users/gettranscationpassword', 'UserProfileController@getTranscationPassword');
Route::post('/v1/users/editprofile', 'UserProfileController@edit');
Route::post('/v1/users/getbankdetails', 'UserProfileController@getBankInfoWithIFSC');





    //End Of Routes

//Checkout Routes
Route::post('/v1/users/reports/checkoutsummary', 'CheckoutSummarysController@show');
Route::post('/v1/users/reports/checkoutorderlist', 'CheckoutSummarysController@checkoutOrderList');
    //End Of Routes
//Goal Routes
Route::post('/v1/users/goals', 'GoalController@show');
Route::post('/v1/users/addgoals', 'GoalController@store');
Route::post('/v1/users/goalslist', 'GoalController@getGoalsList');
Route::post('/v1/users/goalssummary', 'GoalController@getGoalsSummaryList');
Route::post('/v1/users/goalsdetails', 'GoalController@getGoalsDetailsList');
Route::post('/v1/users/usergoalslist', 'GoalController@getUserGoalsSummaryList');
Route::post('/v1/users/goalssummarydetails', 'GoalController@getGoalsSummaryListWithGoalId');
Route::post('/v1/users/wealthsummarydetails', 'GoalController@getWealthSummaryListWithWealthId');
Route::post('/v1/users/goalsassetsallocation', 'GoalController@goalsAssestsAllocation');
Route::post('/v1/users/getgoalsassetsallocation', 'GoalController@getgoalsAssestsAllocation');
Route::post('/v1/users/allocateinvest', 'GoalController@getGoalsWealthList');
Route::post('/v1/users/allocateuserfunds', 'GoalController@getGoalsWealthListWithId');
Route::post('/v1/users/customeraddfund', 'GoalController@CustomerAllocateNewFundSelection');
Route::post('/v1/users/getredeemcurrentinvest', 'GoalController@getGoalsWealthCurrInvest');
Route::post('/v1/users/userpartialredemption', 'GoalController@getGoalsWealthPartialFunds');
Route::post('/v1/users/usernewgoals', 'GoalController@getNewUserAddedGoals');
Route::post('/v1/users/adduserredemption', 'GoalController@customerFundsRedemption');
Route::post('/v1/users/userredemptionsummary', 'GoalController@getRedemptionSummary');
Route::post('/v1/users/usersipredemptionsummary', 'GoalController@getSipRedemptionSummary');
Route::post('/v1/users/usersipmodifysummary', 'GoalController@getSipModifiedSummary');
Route::post('/v1/users/userchangesipredemptionsummary', 'GoalController@getSipRedemptionSummaryAfterAmountChange');
Route::post('/v1/users/getassetrebalancing', 'GoalController@getAssetRebalancing');
Route::post('/v1/users/addassetrebalancing', 'GoalController@addChangedAssetsRebalance');
Route::post('/v1/users/getassetrebalancingdata', 'GoalController@getAssetRebalancingData');


    //End Of Routes

//ProductSelection Routes
Route::post('/v1/rebalancing/productselection', 'ProductSelectionController@show');
    //End Of Routes
//AssestsRebalancing Routes
Route::post('/v1/rebalancing/assetrebalancing', 'AssetRebalancingController@show');
    //End Of Routes
    //
//AssestsRebalancing Routes
Route::post('/v1/invest/reedem/allocateinvestment', 'AllocateInvestmentController@show');
    //End Of Routes

//AssestsRebalancing Routes
Route::post('/v1/invest/reedem/allocatefunds', 'AllocateFundsController@show');
    //End Of Routes

    //End Of Routes

//FundPerformance Routes
Route::post('/v1/products/funddetails/basicinfogetfunds', 'FundPerformanceController@show');
//Route::post('getfunds', 'FundPerformanceController@show');
    //End Of Routes

//FundHoldings Routes
Route::post('/v1/products/funddetails/getfundhold', 'FundHoldingsController@show');
    //End Of Routes

//Fundroi Routes
Route::post('/v1/products/funddetails/getfundroi', 'FundroiController@show');
    //End Of Routes

//FundNav Routes
Route::post('/v1/products/funddetails/getfundnav', 'FundNavController@show');
Route::post('/v1/products/funddetails/addnav','FundnavController@store');
    //End Of Routes

//Category Routes
Route::post('/v1/products/category', 'CategoryController@show');
Route::get('/v1/products/getcategorylist', 'CategoryController@getCategoryList');
Route::get('/v1/products/getsubcategorylist', 'CategoryController@getSubCategoryList');
Route::get('/v1/products/getfundhouselist', 'CategoryController@getFundHouseList');

//End Of Routes

//Dashboard Routes
Route::post('/v1/records/dashboardrisks', 'DashboardRecordsController@show');
Route::get('/v1/records/usergoals', 'DashboardRecordsController@userGoals');
Route::get('/v1/records/wealthdashboard', 'DashboardRecordsController@wealthDashboard');
//End Of Routes

//Wealth Dashboard
Route::post('/v1/records/addwealthallocation', 'WealthAllocationController@store');
Route::post('/v1/records/getwealthallocation', 'WealthAllocationController@show');
Route::post('/v1/records/getwealthassets','WealthAllocationController@getWealthAssestType');
Route::post('/v1/records/getcustomerwealthallocation','WealthAllocationController@getCustomerWealthAllocation');

//End

//Fund Routes
Route::post('/v1/products/funddetails/fundranking', 'FundBasicInfoController@FundRanking');
Route::post('/v1/products/funddetails/customerfundposttran', 'FundBasicInfoController@store');
Route::post('/v1/products/funddetails/customercheckoutsummary', 'FundBasicInfoController@UserCheckoutSummary');
Route::post('/v1/products/funddetails/customerfunddataposttran', 'FundBasicInfoController@funddataposttran');
Route::post('/v1/products/funddetails/customerfunddetailposttran', 'FundBasicInfoController@funddetailposttran');
Route::post('/v1/products/funddetails/getfundproducts', 'FundBasicInfoController@getFundsDetails');
Route::post('/v1/products/funddetails/getwealthfundproducts', 'FundBasicInfoController@getWealthFundsDetails');
Route::post('/v1/products/funddetails/getselectedfundproducts', 'FundBasicInfoController@getCustomerSelectedProducts');
Route::post('/v1/products/funddetails/getcustomerordersummary', 'FundBasicInfoController@getCustomerOrderDetails');
Route::post('/v1/products/funddetails/getcustomergoalsordersummary', 'FundBasicInfoController@getCustomerGoalsOrderDetails');
Route::post('/v1/products/funddetails/addfundselection', 'FundBasicInfoController@CustomerFundSelection');
Route::post('/v1/products/funddetails/customerfundsupdate', 'FundBasicInfoController@customerFundsUpdate');
Route::post('/v1/products/funddetails/getmutualfunds', 'FundBasicInfoController@getMutualFunds');
Route::post('/v1/products/funddetails/getmutualfundsdetails', 'FundBasicInfoController@getFundProductsById');
Route::post('/v1/products/funddetails/searchmutualfunds', 'FundBasicInfoController@mutualfundsSearch');

//End Of Routes

//Dashboard Routes
Route::post('/v1/products/funddetails/navdetails', 'FundBasicInfoController@show');
//End Of Routes

//RiskDashboard Routes
//Route::post('/v1/users/reports/getriskprofile', 'RiskDashboardRecordController@getRiskDashboardRecords');
//End Of Routes

//RiskProfileDashboard Routes
Route::post('/v1/users/reports/riskprofilequestions', 'RiskQuestionsController@store');
Route::post('/v1/users/reports/getriskprofilescore', 'RiskQuestionsController@getRiskProfileScore');
Route::post('/v1/users/reports/getriskprofile', 'RiskQuestionsController@getRiskProfile');

//End Of Routes

//Documents Routes
Route::post('/v1/users/document/adddocument', 'DocumentsController@store');
Route::get('/v1/users/document/getdocuments', 'DocumentsController@show');
Route::post('/v1/users/document/getuploadeddocuments', 'DocumentsController@getUploadedDocuments');
Route::post('/v1/users/document/documentdownload', 'DocumentsController@getDownload');
//Route::post('/v1/users/reports/getriskprofilescore', 'RiskQuestionsController@getRiskProfileScore');
//Route::post('/v1/users/reports/getriskprofile', 'RiskQuestionsController@getRiskProfile');

//End Of Routes

//Question Routes
Route::post('/v1/users/reports/addquestions', 'QuestionController@store');
Route::post('/v1/users/reports/addquestionsoptions', 'QuestionController@QuestionOptions');
Route::get('/v1/users/reports/getquestions', 'QuestionController@show');

//End Of Routes


//Product Routes
Route::get('/v1/products/getmutualfund', 'ProductController@getMutualFund');
//End Of Routes

//Surplus Calculation Routes
Route::post('/v1/products/addsurplusamount', 'SurplusCalculationController@store');
Route::post('/v1/products/getsurplusdetails', 'SurplusCalculationController@show');
//End Of Routes

//Notification Routes
Route::post('/v1/users/addnotification', 'NotificationController@store');
Route::post('/v1/users/getusernotifications', 'NotificationController@show');
Route::post('/v1/users/removenotification', 'NotificationController@removeNotification');
Route::post('/v1/users/notificationstatus', 'NotificationController@notificationStatus');
    //End Of Routes


Route::post('/v1/users/usereventsnotify', 'EmailController@UserEmailSMSNotifications');
Route::post('/v1/users/emailotpverify', 'UserProfileController@EmailOTPVerify');
Route::post('/v1/users/otpverify', 'UserProfileController@otpVerify');
Route::post('/v1/users/resendotp', 'UserProfileController@resendOTP');
Route::post('/v1/users/editcustomersettings', 'UserProfileController@editCustomerSettings');
Route::post('/v1/users/profilestatus', 'UserProfileController@profileStatus');
Route::post('/v1/users/customersettings', 'UserProfileController@customerSettings');

// Download Reports
Route::post('/v1/users/customerreports', 'EmailController@customerReports');
// End



Route::get('/tasks', 'TaskController@index')->name('tasks.index');

Route::post('/tasks', 'TaskController@store')->name('tasks.store');

Route::get('/tasks/{task}', 'TaskController@show')->name('tasks.show');

Route::put('/tasks/{task}', 'TaskController@update')->name('tasks.update');

Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');

/* BSE */
Route::post('/v1/bse/getpassword','BSEController@getOrderPassword');
Route::post('/v1/bse/uploadpassword','BSEController@UploadPassword');
Route::post('/v1/bse/getpaymentlink','BSEController@getPaymentLink');
Route::post('/v1/bse/mfneworderpurchase','BSEController@MFNewOrderPurchase');
Route::post('/v1/bse/mfneworderredemption','BSEController@MFNewOrderRedemption');

Route::post('v1/bse/mfsipupdate','BSEController@MFSipUpdate');
Route::post('v1/bse/mfsipcreateorder','BSEController@MFSipCreateOrder');
Route::post('v1/bse/mfsipcancelorder','BSEController@MFSipCancelOrder');
Route::post('v1/bse/mfswitchorder','BSEController@MFSwitchOrder');
Route::post('v1/bse/clientcodecreation','BSEController@ClientCodeCreation');
Route::post('v1/bse/transactionpostdata','FundBasicInfoController@AddTranscationDataToPostTable');

\DB::listen(function($sql) {
    \Log::info($sql->sql);
    \Log::info($sql->bindings);
    \Log::info($sql->time);
});
/* End BSE */

//Route::group(['prefix' => 'users'], function()
//{
//    Route::post('/signup', 'UserController@signup');
//});
// Jwt Authentication
  // });
// End
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
// });

