<?php

namespace App\models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transcations extends Model
{
    protected $table = 'transactions';

   	public $timestamps = false;
   
    public function InsertCustomerFundDetailPostTran($arr)
    {
       return $this->insertGetId($arr);
    }

     public function getCustomerTranscationDetails($Id)
    {
        return $this->join('customerorderdetailpretran as dp','dp.customerorderid','transactions.customerorderid')
        	->join('customerorderpretran as p','p.customerorderid','dp.customerorderid')
            //->where('dp.customerorderid','=','transactions.customerorderid')
        	->where('p.customerid',$Id)
        	->where('p.orderstatus','completed')
        	->get()->toArray();
    }
}
