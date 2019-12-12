<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class DocumentsController extends Controller
{
    function __construct(Documents $documents,Customer $customer) {
        $this->documents = $documents;
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
        $rules = array(
            //'document' => 'mimes:jpeg,jpg,png',
            'userid' => 'required | string',
            'documenttypeid' => 'required | integer',
            'documentname' => 'required | string',
            'document' => 'required | string'
        );
         $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $image_parts = explode(";base64,", $request['document']);
          $image_type_aux = explode("image/", $image_parts[0]);
          $image_type = $image_type_aux[0];
          $image_base64 = base64_decode($image_parts[0]);
          //Image Name
          $fileName=uniqid().'.png';

        // $file = $request->file('document');
        // $fileName = $file->getClientOriginalName();
          // $fileName = $file;
        // dd($file);
        $file_pointer = public_path('usersdocuments');//.'/usersdocuments/'.$request['userid'];
           if (!file_exists($file_pointer)) {
              $folder=mkdir($file_pointer, 777,true);
          }
          //Image Path with name
          $file = $file_pointer.'/'.$fileName;
          //Save file in path
          file_put_contents($file, $image_base64);
     /*   $file->move($destinationPath,$fileName);
        chmod($destinationPath,0777);*/
        $reqData['documentpath']=$fileName;
        $reqData['documentname'] = $request['documentname'];
        $reqData['customerid'] = $getCustomerInfo['customerid'];
        $reqData['documenttypeid'] = $request['documenttypeid'];
        $reqData['createdutcdatetime'] = Carbon::now();
        $reqData['modifiedutcdatetime'] = Carbon::now();
        $documentData = $this->documents->InsertDocuments($reqData);
        if($documentData)
        {
            /*$documentDetails = $this->documents->getDocumentsDetails($documentData);*/
            return response()->json([
                'status' => 'Document Uploaded Successfully'
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
        $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
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

    public function getUploadedDocuments(Request $request)
    {
           $validator = Validator::make($request->json()->all(), [
            'userid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
         $getCustomerInfo = $this->customer->getUserDetailsrow($request['userid']);
        $documentDetails = $this->documents->getDocumentsDetailsByUserId($getCustomerInfo['customerid']);
        $docArr = array();
        foreach ($documentDetails as $key => $value) {
            $doc['documenttypeid'] = $value['documenttypeid'];
            $doc['customerdocumentid'] = $value['customerdocumentid'];
            $doc['documentname'] = $value['documentname'];
            $doc['documentpath'] = url('usersdocuments/'.$value['documentpath']);
            array_push($docArr, $doc);
        }
        if($docArr)
        {
           return response()->json([
                'status' => 'success',
                'Documents' => $docArr
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 'failed'
            ], 401);
        }
    }

    public function getDownload(Request $request)
    {
      $validator = Validator::make($request->json()->all(), [
            'customerdocumentid' => 'required|string|max:255'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ], 400);
        }
    $documentDetails = $this->documents->getDocumentsDetails($request['customerdocumentid']);
    // dd($documentDetails['documentpath']);
    $file= public_path(). "/usersdocuments/".$documentDetails['documentpath'];   
    $name = basename($file);
    return response()->download($file,$name);
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
