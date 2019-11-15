<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\changeaddress;
use App\Mail\changemobileno;
use App\Mail\changepassword;
use App\Mail\customersupport;
use App\Mail\ForgotpasswordReset;
use App\Mail\kycstatus;
use App\Mail\NACHmandate;
use App\Mail\newbank;
use App\Mail\orderplacement;
use App\Mail\orderstatus;
use App\Mail\otp;
use App\Mail\rebalancetrigger;
use App\Mail\sigupemail;
use App\Mail\sucesslogin;

class MailController extends Controller {
   public function resendotpemail() {

     $data = array('subject'=>"WERT OTP to login",'name' =>'venkat');
     //send(new otp($data))
       Mail::to('uday1251@gmail.com')->send(new otp($data));
      echo "OTP is sent to Email Sent. Check your inbox.";
   }
   public function Forgetpasswordemail() {

     $data = array('subject'=>"WERT forgot password Email",'name' =>'venkat');

       Mail::to('prashanthi@kloudportal.com')->send(new ForgotpasswordReset($data));
      echo "Forget Password Email Sent. Check your in box.";
   }
   public function  successfullyloginemail() {

     $data = array('subject'=>"WERT Successfully Login",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new sucesslogin($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  changeaddress() {

     $data = array('subject'=>"WERT Successfully You have change Address",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new changeaddress($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  changemobileno() {

     $data = array('subject'=>"WERT change mobileno Successfully",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new changemobileno($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  changepassword() {

     $data = array('subject'=>"WERT change password Successfully ",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new changepassword($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  customersupport() {

     $data = array('subject'=>"WERT customer support",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new customersupport($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  kycstatus() {

     $data = array('subject'=>"WERT KYC status ",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new kycstatus($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  NACHmandate() {

     $data = array('subject'=>"WERT NACH mandate",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new NACHmandate($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  newbank() {

     $data = array('subject'=>"WERT New bank added Successfully ",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new newbank($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  orderplacement() {

     $data = array('subject'=>"WERT order placement",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new orderplacement($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  orderstatus() {

     $data = array('subject'=>"WERT order status",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new orderstatus($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  rebalancetrigger() {

     $data = array('subject'=>"rebalancetrigger",'name' =>'venkat');

       Mail::to('venkatsai.pallapu@kloudportal.com')->send(new rebalancetrigger($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }
   public function  sigupemail() {

     $data = array('subject'=>"You have  Successfully signup",'name' =>'venkat');

       Mail::to('prashanthi@kloudportal.com')->send(new sigupemail($data));
      echo " You have Successfully Login into WERT . Check your inbox.";
   }

}
