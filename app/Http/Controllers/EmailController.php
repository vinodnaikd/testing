<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\FundPerformance;
	use App\Models\Bank;
use PDF;

class EmailController extends Controller
{
	public function __construct(
        Customer $customer,
        FundPerformance $fundperformance,
        Bank $bank
    )
    {
        $this->customer = $customer;
        $this->fundperformance = $fundperformance;
        $this->bank = $bank;
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
		//Taxation Report
if($request['report_type'] == "taxation_report") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()

			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$TaxationData ['port']= $this->fundperformance->getCustomerTaxationReport($getCustomerInfo['customerid'],$from_date,$to_date);
 $TaxationData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
	view()->share('TaxationData',$TaxationData);
		$pdf = PDF::loadView('reports.taxation_report')->setPaper('a3','landscape');
		return $pdf->download('taxation_report.pdf');
}

//Portfolio detailed
elseif ($request['report_type'] == "portfolio_detailed") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$PortfolioData['port'] = $this->fundperformance->getCustomerPortfolioDetailed($getCustomerInfo['customerid'],$from_date,$to_date);
 $PortfolioData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
// dd(	$PortfolioData['port']);
	view()->share('PortfolioData',$PortfolioData);
		$pdf = PDF::loadView('reports.portfolio_detailed')->setPaper('a3', 'landscape');
		return $pdf->download('portfolio_detailed.pdf');
}

//Account Statement
elseif ($request['report_type'] == "account_statement") {

	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$accountData['port'] = $this->fundperformance->getCustomerAccountStatement($getCustomerInfo['customerid'],$from_date,$to_date);
 $accountData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
	//$accountData = $this->fundperformance->getCustomerAccountStatement($getCustomerInfo['customerid'],$from_date,$to_date);
// dd($accountData['port']);
	view()->share('accountData',$accountData);
		$pdf = PDF::loadView('reports.account_statement')->setPaper('a3', 'landscape');
		return $pdf->download('account_statement.pdf');
}

//Portfolio Summary Report
elseif ($request['report_type'] == "portfolio_summary_report") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);
	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$portfoliosummaryData['port'] = $this->fundperformance->getCustomerPortfolioSummaryReport($getCustomerInfo['customerid'],$from_date,$to_date);
// dd($portfoliosummaryData['port']);
 $portfoliosummaryData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);


	view()->share('portfoliosummaryData',$portfoliosummaryData);
		$pdf = PDF::loadView('reports.portfolio_summary ')->setPaper('a3','landscape');
		return $pdf->download('portfolio_summary_report.pdf');
}

//SIP summary
elseif ($request['report_type'] == "sip_summary") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$sipsummaryData ['port']= $this->fundperformance->getCustomerSipSummary($getCustomerInfo['customerid'],$from_date,$to_date);
$sipsummaryData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
	view()->share('sipsummaryData',$sipsummaryData);
  //dd($sipsummaryData ['port']);
		$pdf = PDF::loadView('reports.sip_summary')->setPaper('a3', 'landscape');
		return $pdf->download('sip_summary.pdf');
}

//Redemption report
elseif ($request['report_type'] == "redemption_report") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

 $redemptionreportData['port'] = $this->fundperformance->getCustomerRedemptionReport($getCustomerInfo['customerid'],$from_date,$to_date);

$redemptionreportData['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
	view()->share('redemptionreportData',$redemptionreportData);
		$pdf = PDF::loadView('reports.redemption_report')->setPaper('a3', 'landscape');
		return $pdf->download('redemptionreport.pdf');
}

//Rebalancing report

elseif ($request['report_type'] == "rebalancing_report") {
	$validator = Validator::make($request->json()->all(), [
			'from_date' => 'required|string|max:100',
			'to_date' => 'required|string|',
	]);

	if($validator->fails()) {
			return response()->json([
					'status' => 'error',
					'messages' => $validator->messages()
			], 400);
	}
		$from_date = $request['from_date'];
		$to_date = $request['to_date'];

	$rebalancingreport['port'] = $this->fundperformance->getCustomerRebalancingReport($getCustomerInfo['customerid'],$from_date,$to_date);
$rebalancingreport['user']=$this->bank->getUserinfo($getCustomerInfo['customerid'],$from_date,$to_date);
//dd(	$rebalancingreport['port']);
	view()->share('rebalancingreport',$rebalancingreport);
		$pdf = PDF::loadView('reports.rebalancing_report')->setPaper('a3', 'landscape');
		return $pdf->download('rebalancingreport.pdf');
	}
}

}