<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
      protected $table = "customerdocument";
      protected $fillable =
[
    'customerid',
    'documenttypeid',
    'documentname',
    'documentpath',
    ''
];
        public $timestamps = false;
    public function InsertDocuments($arr)
    {
       return $this->insertGetId($arr);
        
    }
        public function getDocumentsDetails($id)
    {
//        dd($password);
        return $this->where('customerdocumentid',$id)->get()->toArray();
    }
      public function getDocumentsDetailsByUserId($id)
    {
//        dd($password);
        return $this->where('customerid',$id)->get()->toArray();
    }
}
