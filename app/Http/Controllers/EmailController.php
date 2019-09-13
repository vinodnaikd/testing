<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class EmailController extends Controller
{
	public function __construct(
        Customer $customer
    )
    {
        $this->customer = $customer;
    }

    public function UserEmailSMSNotifications(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }

    	$userData = $this->customer->getUserCustomerDetails($request['userid']);
    	// dd($userData);
    	if($userData['isemailopt'] == "0")
    	{
    		if($option == "Registration")
    		{
    			# Mail Code For Registration
    		}
    		elseif($option == "Fundselection")
    		{
    			# Mail Code For Fundselection
    		}
    	}
    	elseif ($userData['issmsopt'] == "0") {
    		# code...
    	}
    	elseif ($userData['isnotificationopt'] == "0") {
    		# code...
    	}
    }
}
