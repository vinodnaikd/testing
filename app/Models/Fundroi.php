<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
      // dd($arr);
      $arr['orderdetailid'] = "DJ456-SSD5-DDDD-GDGJ-DDSF-".rand()."KJSDF35675".rand();
      // dd($arr);
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

 public function getFundLumpsumRedemption($customerid,$fundid,$goalid)
    {
      return $this->select(DB::raw('SUM(customerorderdetailpretran.lumpsumamount) as amount'))->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('fundid',$fundid)->where('customergoalid',$goalid)->where('paymenttype',"Redemption")->where('purchasetype',"L")->get()->first();
    }

    public function getFundSipRedemption($customerid,$fundid,$goalid)
    {
      return $this->select(DB::raw('SUM(customerorderdetailpretran.sipamount) as amount'))->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('fundid',$fundid)->where('customergoalid',$goalid)->where('paymenttype',"Redemption")->where('purchasetype',"S")->get()->first();
    }

    public function checkSipModified($customerid)
    {
      return $this->select('op.customerorderid','customerorderdetailpretran.sipamount')->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('purchasetype',"S")->get()->first();
    }

     public function InsertCustomerFundRedemption($arr)
    {
      return $this->insertGetId($arr);
    }

    public function getRedemptionSummaryDetails($customerid)
    {
      return $this->select('customerorderdetailpretran.orderdetailid','customerorderdetailpretran.customergoalid','op.customerid')->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('paymenttype',"Redemption")->get()->toArray();
    }

    public function updateSipModifiedData($arr,$IdsArray)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerorderid',$IdsArray['customerorderid'])->where('fundid',$IdsArray['fundid'])->where('customergoalid',$IdsArray['goalid'])->where('purchasetype','=','S')->update($arr);
    }
}
