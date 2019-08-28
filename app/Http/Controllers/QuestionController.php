<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOptions;
use App\Models\RiskQuestions;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class QuestionController extends Controller
{
    public function __construct(
        Question $questions,
        QuestionOptions $questionsoptions,
        RiskQuestions $riskquestions,
        Customer $customer
    )
    {
        $this->question = $questions;
        $this->questionoptions = $questionsoptions;
        $this->riskquestions = $riskquestions;
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
            'questiontext' => 'required|string|max:255',
            'questionorder' => 'required|string|max:255',
            'questionid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['questiontext'] = $request['questiontext'];
        $reqData['questionorder'] = $request['questionorder'];
        $reqData['questionid'] = $request['questionid'];
        $questionData = $this->question->InsertQuestions($reqData);
         return response()->json([
              'status' => 'Question Added Successfully',
          ], 200);
        
    }
    
     public function QuestionOptions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'optionname' => 'required|string|max:255',
            'score' => 'required|string|max:255',
            'questionid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $reqData['optionname'] = $request['optionname'];
        $reqData['score'] = $request['score'];
        $reqData['questionid'] = $request['questionid'];
        $questionoptionsData = $this->questionoptions->InsertQuestionsOptions($reqData);
         return response()->json([
              'status' => 'Question Options Added Successfully',
          ], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $questionoptionsData = $this->question->getQuestions();
       
        $questionsData = array();
        foreach($questionoptionsData as $key =>$value)
        {
           $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
            $questionoptionsData1 = $this->questionoptions->getQuestionsOptions($value['questionid']);
            $queData['questionid'] = $value['questionid'];
            $queData['questiontext'] = $value['questiontext'];
            
                 $queOptnData1 = array();
            foreach ($questionoptionsData1 as $key1 => $value1) {
                
                $queOptnData['optionid'] = $value1['optionid'];
                $queOptnData['optionname'] = $value1['optionname'];
                array_push($queOptnData1,$queOptnData);
            }
            $submittedoptionsData = $this->riskquestions->getSubmittedOptions($value['questionid'],$getCustomerInfo['customerid']);
            $queData['Options'] = $queOptnData1;
            if($submittedoptionsData)
            $queData['AnswerOption'] = $submittedoptionsData['optionid'];
            else
            $queData['AnswerOption'] = "";
        if($value['questionid'] == "10007")
            {
            $queData['imagepath'] = url('/portfolio.png');
            }
            //dd($queData);
           //array_push($questionsData,$queOptnData1);
            array_push($questionsData,$queData);
             //dd($queOptnData);
        }
        //dd($queOptnData);
         return response()->json([
              'questions' => $questionsData
          ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
