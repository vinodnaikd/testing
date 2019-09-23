<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundroi extends Model
{
   protected $table = "customerorderdetailpretran";
  protected $fillable =
   [
       'orderdetailid',
       'customerorderid',
       'customergoalid',
       'fundid',
       'purchasetype',
       'startdate',
       'sipamount',
       'sipmonthlydate',
       'sipduration',
       'sipunits',
       'purchasenav',
       'lumpsumamount',
       'lumpsumunits',
       'transactionstatus'
   ];
public $timestamps = false;
   public function InsertCustomerOrderDetailsPretran($arr)
    {
      return $this->insertGetId($arr);
    }
    public function updateCustomerFundDetails($arr,$IdsArray)
    {
      return $this->where('customerorderid',$IdsArray['customerorderid'])->where('fundid',$IdsArray['fundid'])->where('customergoalid',$IdsArray['goalid'])->where('purchasetype',$IdsArray['purchasetype'])->update($arr);
    }

    public function checkCustomerSelectedFund($IdsArray)
    {
      return $this->where('customerorderid',$IdsArray['customerorderid'])->where('fundid',$IdsArray['fundid'])->where('customergoalid',$IdsArray['goalid'])->get()->first();
    }

    public function updateCustomerFundValue($arr,$IdsArray)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$IdsArray['customerid'])->where('fundid',$IdsArray['fundid'])->where('customergoalid',$IdsArray['goalid'])->where('purchasetype',$IdsArray['purchasetype'])->update($arr);
    }

}
