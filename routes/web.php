<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('Forgetpasswordemail','MailController@Forgetpasswordemail');
Route::get('resendotpemail','MailController@resendotpemail');
Route::get('successfullyloginemail','MailController@successfullyloginemail');

Route::get('changeaddress','MailController@changeaddress');
Route::get('changemobileno','MailController@changemobileno');
Route::get('changepassword','MailController@changepassword');
Route::get('customersupport','MailController@customersupport');
Route::get('kycstatus','MailController@kycstatus');
Route::get('NACHmandate','MailController@NACHmandate');
Route::get('newbank','MailController@newbank');
Route::get('orderplacement','MailController@orderplacement');
Route::get('orderstatus','MailController@orderstatus');
Route::get('rebalancetrigger','MailController@rebalancetrigger');
Route::get('sigupemail','MailController@sigupemail');
