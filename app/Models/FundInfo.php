<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundInfo extends Model
{
  protected $table = 'customerfunddataposttran';
  protected $fillable =
    [
        'customerid',
        'funddataid',
        'purchasetype',
        'customerfundid',
        'sipamount',
        'sipmonthlydate',
        'sipduration',
        'lumpsumamount',
        'nextsipdate',
        'startdate',
        'enddate'
    ];
   public $timestamps = false;
   
    public function InsertCustomerFundDataPostTran($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
     public function UpdateCustomerFundDataPostTran($arr,$Id)
    {
        return $this->where('funddataid','=',$Id)->update($arr);
    }
    
    public function getCustomerFundDataPostTran($Id)
    {
        return $this->where('funddataid',$Id)->get()->toArray();
    }
}
