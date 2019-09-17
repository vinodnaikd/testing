<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\FundPerformance;
use PDF;

class EmailController extends Controller
{
	public function __construct(
        Customer $customer,
        FundPerformance $fundperformance
    )
    {
        $this->customer = $customer;
        $this->fundperformance = $fundperformance;
    }

    public function UserEmailSMSNotifications(Request $request)
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

    public function customerReports(Request $request)
    {
    	ini_set('max_execution_time', 300);
    	$validator = Validator::make($request->json()->all(), [
            'report_type' => 'required|string|max:100',
            'userid' => 'required|string|',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }

        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);

    	if($request['report_type'] == "taxation_report")
    	{
    		$data = array(1,2,2,3);
    		view()->share('data',$data);
        	$pdf = PDF::loadView('reports.view');
        	return $pdf->download('taxation_report.pdf');
    	}
    	elseif ($request['report_type'] == "rebalancing_report") {

    		view()->share('data',$data);
        	$pdf = PDF::loadView('reports.rebalancing_report');
        	return $pdf->download('rebalancing_report.pdf');
    	}
    	elseif ($request['report_type'] == "portfolio_detailed") {

    		view()->share('data',$data);
        	$pdf = PDF::loadView('reports.portfolio_detailed');
        	return $pdf->download('portfolio_detailed.pdf');
    	}
    	elseif ($request['report_type'] == "account_statement") {
    		$accountData = $this->fundperformance->getCustomerAccountStatement($getCustomerInfo['customerid']);
    		// dd($accountData);
    		view()->share('accountData',$accountData);
        	$pdf = PDF::loadView('reports.account_statement');
        	return $pdf->download('account_statement.pdf');
    	}
    	elseif ($request['report_type'] == "portfolio_summary_report") {

    		view()->share('data',$data);
        	$pdf = PDF::loadView('reports.portfolio_summary_report');
        	return $pdf->download('portfolio_summary_report.pdf');
    	}
    	elseif ($request['report_type'] == "sip_summary") {

    		$sipsummaryData = $this->fundperformance->getCustomerSipSummary($getCustomerInfo['customerid']);
    		// dd($sipsummaryData);
    		view()->share('sipsummaryData',$sipsummaryData);
        	$pdf = PDF::loadView('reports.sip_summary');
        	return $pdf->download('sip_summary.pdf');
    	}
    	elseif ($request['report_type'] == "redemption_report") {

    		view()->share('data',$data);
        	$pdf = PDF::loadView('reports.redemption_report');
        	return $pdf->download('redemption_report.pdf');
    	}
    	
    }
}
