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

Route::group(['middleware' => 'auth:api'], function() { 

    //User Routes
//Route::post('signup', 'UserProfileController@show');
Route::post('signup', 'UserProfileController@store');
Route::post('signin', 'UserProfileController@signIn');
Route::post('changeaddress', 'UserProfileController@changeAddress');
    //End Of Routes

//Checkout Routes
Route::post('checkoutsummary', 'CheckoutSummarysController@show');
    //End Of Routes
//Goal Routes
Route::post('goals', 'GoalController@show');
    //End Of Routes

//ProductSelection Routes
Route::post('productselection', 'ProductSelectionController@show');
    //End Of Routes

//AssestsRebalancing Routes
Route::post('assetrebalancing', 'AssetRebalancingController@show');
    //End Of Routes
    //
//AssestsRebalancing Routes
Route::post('allocateinvestment', 'AllocateInvestmentController@show');
    //End Of Routes

//AssestsRebalancing Routes
Route::post('allocatefunds', 'AllocateFundsController@show');
    //End Of Routes

//Bank Routes
Route::post('getbanklist', 'BankController@show');
    //End Of Routes

//Nominee Routes
Route::post('getnominee', 'NomineeController@show');
    //End Of Routes

//Nominee Routes
Route::post('getfunds', 'FundPerformanceController@show');
    //End Of Routes

//FundHoldings Routes
Route::post('getfundhold', 'FundHoldingsController@show');
    //End Of Routes

//Fundroi Routes
Route::post('getfundroi', 'FundroiController@show');
    //End Of Routes

//FundNav Routes
Route::post('getfundnav', 'FundNavController@show');
Route::post('addnav','FundnavController@store');
    //End Of Routes

//Category Routes
Route::post('category', 'CategoryController@show');
//End Of Routes

//Dashboard Routes
Route::post('dashboardrisks', 'DashboardRecordsController@show');
//End Of Routes

//Dashboard Routes
Route::post('fundsbasicinfo', 'FundBasicInfoController@show');
//End Of Routes

//Dashboard Routes
Route::post('navdetails', 'FundBasicInfoController@show');
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
});

