<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function UserEmailSMSNotifications($userid,$type,$option)
    {
    	if($type == "Email")
    	{

    	}
    	elseif ($type == "SMS") {
    		# code...
    	}
    	elseif ($type == "Notifications") {
    		# code...
    	}
    }
}
