<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    function __construct(Documents $documents) {
        $this->documents = $documents;
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
        $rules = array(
            'document' => 'mimes:jpeg,jpg,png',
            'customerid' => 'required | integer',
            'documenttypeid' => 'required | integer',
            'documentname' => 'required | string '
        );
         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        
        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path().'/'.$request['customerid'];
        $file->move($destinationPath,$fileName);
        chmod($destinationPath,0777);
        $reqData['documentpath']=$destinationPath.'/'.$fileName;
        $reqData['documentname'] = $request['documentname'];
        $reqData['customerid'] = $request['customerid'];
        $reqData['documenttypeid'] = $request['documenttypeid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $documentData = $this->documents->InsertDocuments($reqData);
        if($documentData)
        {
            $documentDetails = $this->documents->getDocumentsDetails($documentData);
            return response()->json([
                'status' => 'success',
                'messages' => $documentDetails
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $documents)
    {
        $documentsData = DB::table('documenttype')->get();
        if($documentsData)
        {
           return response()->json([
                'status' => 'success',
                'Documents' => $documentsData
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 'failed'
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $documents)
    {
        //
    }
}
