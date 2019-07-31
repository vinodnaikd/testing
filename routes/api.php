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

Route::post('/register', 'AuthController@register');
 //Route::group(['middleware' => ['api']], function() {
Route::post('/login', 'AuthController@login');
// });
Route::post('/logout', 'AuthController@logout');
Route::post('db', 'AllocateEquitytableController@index');

//Route::group(['middleware' => 'auth:api'], function() { 

     //User Routes
//Route::post('signup', 'UserProfileController@show');
Route::post('/v1/users/signup', 'UserProfileController@store');
Route::post('/v1/users/signin', 'UserProfileController@signIn');
Route::get('/v1/users/signout', 'UserProfileController@signOut');
Route::post('/v1/users/changeaddress', 'UserProfileController@changeAddress');
Route::post('/v1/users/forgotpassword', 'UserProfileController@forgotPassword');
Route::post('/v1/users/changepassword', 'UserProfileController@changePassword');
Route::post('/v1/users/editprofile', 'UserProfileController@edit');
Route::post('/v1/users/customersettings', 'UserProfileController@customerSettings');
Route::post('/v1/users/phoneotpverify', 'UserProfileController@PhoneOTPVerify');
Route::post('/v1/users/emailotpverify', 'UserProfileController@EmailOTPVerify');
Route::post('/v1/users/editcustomersettings', 'UserProfileController@editCustomerSettings');
Route::post('/v1/users/profilestatus', 'UserProfileController@profileStatus');
Route::post('/v1/users/settranscationpassword', 'UserProfileController@setTranscationPassword');
Route::get('/v1/users/gettranscationpassword', 'UserProfileController@getTranscationPassword');
    //End Of Routes

//Checkout Routes
Route::post('/v1/users/reports/checkoutsummary', 'CheckoutSummarysController@show');
Route::post('/v1/users/reports/checkoutorderlist', 'CheckoutSummarysController@checkoutOrderList');
    //End Of Routes
//Goal Routes
Route::post('/v1/users/goals', 'GoalController@show');
Route::post('/v1/users/addgoals', 'GoalController@store');
Route::get('/v1/users/goalslist', 'GoalController@getGoalsList');
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

//Bank Routes
Route::post('/v1/users/getbanklist', 'BankController@show');
Route::post('/v1/users/addbank', 'BankController@store');
Route::post('/v1/users/editbank', 'BankController@edit');
Route::post('/v1/users/removbank', 'BankController@destroy');
    //End Of Routes

//Nominee Routes
Route::post('/v1/users/getnominee', 'NomineeController@show');
Route::post('/v1/users/addnominee', 'NomineeController@store');
Route::post('/v1/users/removenominee', 'NomineeController@removeNominee');
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

//Dashboard Routes
Route::post('/v1/products/funddetails/fundsbasicinfo', 'FundBasicInfoController@show');
//End Of Routes

//Dashboard Routes
Route::post('/v1/products/funddetails/navdetails', 'FundBasicInfoController@show');
//End Of Routes

//RiskDashboard Routes
Route::post('/v1/users/reports/getriskprofile', 'RiskDashboardRecordController@getRiskDashboardRecords');
//End Of Routes

//RiskProfileDashboard Routes
Route::get('/v1/users/reports/getriskprofilequestions', 'RiskQuestionsController@getRiskProfileQuestions');
Route::get('/v1/users/reports/getriskprofileanswers', 'RiskQuestionsController@getRiskProfileAnswers');

//End Of Routes


//Product Routes
Route::get('/v1/products/getmutualfund', 'ProductController@getMutualFund');
//End Of Routes

//Notification Routes
Route::post('/v1/users/addnotification', 'NotificationController@store');
Route::post('/v1/users/removenotification', 'NotificationController@removeNotification');
Route::post('/v1/users/notificationstatus', 'NotificationController@notificationStatus');
    //End Of Routes

Route::get('/tasks', 'TaskController@index')->name('tasks.index');

Route::post('/tasks', 'TaskController@store')->name('tasks.store');

Route::get('/tasks/{task}', 'TaskController@show')->name('tasks.show');

Route::put('/tasks/{task}', 'TaskController@update')->name('tasks.update');

Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');

//Route::group(['prefix' => 'users'], function()
//{
//    Route::post('/signup', 'UserController@signup');
//});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//});

