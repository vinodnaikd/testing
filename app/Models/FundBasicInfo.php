<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundBasicInfo extends Model
{
     protected $table = 'customerfundposttran';
  protected $fillable =
    [
        'customerid',
        'customergoalid',
        'fundid',
        'orderno',
        'customerfundid'
    ];
   public $timestamps = false;
   
    public function InsertCustomerFundPostTran($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
     public function UpdateCustomerFundPostTran($arr,$Id)
    {
        return $this->where('customerfundid','=',$Id)->update($arr);
    }
    
    public function getCustomerFundPostTran($Id)
    {
        return $this->where('customerfundid',$Id)->get()->toArray();
    }
}
