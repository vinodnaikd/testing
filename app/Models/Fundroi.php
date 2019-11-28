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
    public function checkCustomerFund($IdsArray)
    {
      $data = $this->where('customerorderid',$IdsArray['customerorderid'])->where('customergoalid',$IdsArray['goalid'])->get()->first();
      if($data)
      {
        return $data;
      }
      else
      {
        $data = "empty";
        return $data;
      }
    }
    public function updateCustomerFundValue($arr,$IdsArray)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$IdsArray['customerid'])->where('fundid',$IdsArray['fundid'])->where('customergoalid',$IdsArray['goalid'])->where('purchasetype',$IdsArray['purchasetype'])->update($arr);
    }

    public function getWealthAssetsAllocationDetailsSipLumProducts($customerid,$goalid,$assettype)
   {
    return $this->join('fund as f','customerorderdetailpretran.fundid','=','f.fundid')
                ->join('fundclass as fc','f.fundclassid','=','fc.fundclassid')
                ->where('fc.asset',$assettype)
                ->where('customerorderdetailpretran.customergoalid',$goalid)
                ->groupby('customerorderdetailpretran.fundid')
                ->get()->toArray();
   }

    public function getFundLumpsumRedemption($customerid,$fundid,$goalid)
    {
      return $this->select(DB::raw('SUM(customerorderdetailpretran.lumpsumamount) as amount'))->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('fundid',$fundid)->where('customergoalid',$goalid)->where('paymenttype',"Redemption")->where('purchasetype',"L")->get()->first();
    }

    public function getAddedFunds($customerid,$goalid)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('customergoalid',$goalid)->groupby('fundid')->get()->toArray();
    }

    public function getUserNewGoalsList($customerid,$goalid)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->join('customergoal as g','g.customergoalid','=','customerorderdetailpretran.customergoalid')->where('op.customerid',$customerid)->whereIn('customerorderdetailpretran.customergoalid',$goalid)->groupby('fundid')->get()->toArray();
    }

    public function getUserNewGoals($customerid)
    {
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->groupby('customerorderdetailpretran.customergoalid')->get()->toArray();
    }

    public function getFundSipRedemption($customerid,$fundid,$goalid)
    {
      return $this->select(DB::raw('SUM(customerorderdetailpretran.sipamount) as amount'))->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('fundid',$fundid)->where('customergoalid',$goalid)->where('paymenttype',"Redemption")->where('purchasetype',"S")->get()->first();
    }

    public function checkSipModified($customerid,$fundid)
    {
      return $this->select('op.customerorderid','customerorderdetailpretran.sipamount')->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('op.customerid',$customerid)->where('purchasetype',"S")->where('transactionstatus',"pending")->where('customerorderdetailpretran.fundid',$fundid)->groupby('customerorderdetailpretran.customerorderid')->get()->first();
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

    public function RemoveCustomerFunds($customerid,$customergoalid,$fundid)
    {
      // dd($fundid);
      return $this->join('customerorderpretran as op','op.customerorderid','=','customerorderdetailpretran.customerorderid')->where('customerid','=',$customerid)->where('customergoalid','=',$customergoalid)->whereIn('fundid',$fundid)->delete();
    }
}
