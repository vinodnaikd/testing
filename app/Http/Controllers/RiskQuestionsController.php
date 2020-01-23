<?php

namespace App\Http\Controllers;

use App\Models\RiskQuestions;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RiskQuestionsController extends Controller
{
    public function __construct(RiskQuestions $riskprofile,Customer $customer) {
        $this->riskprofile = $riskprofile;
        $this->customer = $customer;
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
            'optionid' => 'required|string|max:255',
            'questionid' => 'required|string|max:255',
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $reqData['optionid'] = $request['optionid'];
        $reqData['questionid'] = $request['questionid'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
$checkUserQuestions = $this->riskprofile->getSubmittedOptions($request['questionid'],$getCustomerInfo['customerid']);
// dd($checkUserQuestions);
        if($checkUserQuestions)
        {
            //update Risk Profile
            $riskProfile = $this->riskprofile->UpdateCustomerRiskProfile($checkUserQuestions['riskprofileid'],$reqData);
        }
        else
        {
            // Insert Risk Profile
            $riskProfile = $this->riskprofile->InsertCustomerRiskProfile($reqData);
        }
        
      if($riskProfile)
      {
                $customerRiskProfile = $this->riskprofile->getCustomerRiskProfile($getCustomerInfo['customerid']);
                return response()->json([
                'status' => 'success',
                'riskprofile' => $customerRiskProfile
            ], 200);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RiskQuestions  $riskQuestions
     * @return \Illuminate\Http\Response
     */
    public function getRiskProfileScore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerRiskProfileScore = $this->riskprofile->getCustomerRiskProfileScore($getCustomerInfo['customerid']);
        if($customerRiskProfileScore <= 20)
        {
            $riskcategory = "Secure";
        }
        elseif($customerRiskProfileScore >= 21 && $customerRiskProfileScore <=40)
        {
            $riskcategory = "Moderately Secure";
        }
        elseif($customerRiskProfileScore >= 41 && $customerRiskProfileScore <=60)
        {
            $riskcategory = "Moderate";
        }
        elseif($customerRiskProfileScore >= 61 && $customerRiskProfileScore <=80)
        {
            $riskcategory = "Aggressive";
        }
        elseif($customerRiskProfileScore >= 81 && $customerRiskProfileScore <=100)
        {
            $riskcategory = "Highly Aggressive";
        }
       
         return response()->json([
                'status' => 'success',
                'riskprofilescore' => $customerRiskProfileScore,
                'riskcategory'=>$riskcategory 
            ], 200);
        
    }

    public function getRiskProfile(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'userid' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $customerRiskProfile = $this->riskprofile->getCustomerRiskProfile($getCustomerInfo['customerid']);
                return response()->json([
                'status' => 'success',
                'riskprofile' => $customerRiskProfile
            ], 200);
    }
    
    public function getRiskProfileAnswers(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
             'question_id' => 'required|string|max:255',
             'user_answer' => 'required|string|max:255',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 200);
        }
        
        $data['question_name'] = "string";
        $data['option_a'] = "string";
        $data['option_b'] = "string";
        $data['option_c'] = "string";
        $data['option_d'] = "string";
        $data['question_id'] = "string";
        $data['answer_id'] = "string";
    return response()->json([array($data)]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RiskQuestions  $riskQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(RiskQuestions $riskQuestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RiskQuestions  $riskQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiskQuestions $riskQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiskQuestions  $riskQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiskQuestions $riskQuestions)
    {
        //
    }
}
