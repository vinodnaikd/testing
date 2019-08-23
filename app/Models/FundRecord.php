<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundRecord extends Model
{
  protected $table = "customerorderpretran";
  protected $fillable =
   [
       'customerorderid',
       'customerid',
       'orderdate',
       'orderno',
       'orderstatus',
   ];

   public function getCustomerSelectedProducts($customerid)
   {
    return $this->join('customerorderdetailpretran','customerorderpretran.customerorderid','=','customerorderdetailpretran.customerorderid')->where('customerid',$customerid)->get()->toArray();
   }
}
