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
public $timestamps = false;
   public function getCustomerSelectedProducts($customerid,$goalid,$assettype)
   {
    // echo $assettype;
    return $this->join('customerorderdetailpretran','customerorderpretran.customerorderid','=','customerorderdetailpretran.customerorderid')
                ->join('fund','fund.fundid','=','customerorderdetailpretran.fundid')
                ->join('fundclass as fc','fund.fundclassid','=','fc.fundclassid')
                ->where('customerid',$customerid)
                ->where('fc.assettype',$assettype)
                ->where('customerorderdetailpretran.customergoalid',$goalid)->get()->toArray();
   }

   public function getCustomerOrderSummary($customerid,$goal_id,$purchasetype)
   {

    return $this->join('customerorderdetailpretran','customerorderpretran.customerorderid','=','customerorderdetailpretran.customerorderid')->join('fund','fund.fundid','=','customerorderdetailpretran.fundid')->join('fundclass','fund.fundclassid','=','fundclass.fundclassid')->where('customerid',$customerid)->where('customerorderdetailpretran.customergoalid',$goal_id)->where('customerorderdetailpretran.purchasetype',$purchasetype)->where('customerorderdetailpretran.status','pending')->get()->toArray();
   }

      public function getBseInformation($customerid)
    {
      return $this->join('customer as c','c.customerid','customerorderpretran.customerid')
      ->join('sso as s','s.userid','c.userid')
      ->where('customerorderpretran.customerid','=',$customerid)
      ->where('customerorderpretran.orderstatus','=','pending')
      ->get()->first();
    }


      public function CheckLumpsumSipData($customerid,$goal_id)
   {

    return $this->join('customerorderdetailpretran','customerorderpretran.customerorderid','=','customerorderdetailpretran.customerorderid')->where('customerid',$customerid)->where('customerorderdetailpretran.customergoalid',$goal_id)->where('customerorderdetailpretran.lumpsumamount','!=',null)->where('customerorderdetailpretran.sipamount','!=',null)->get()->first();
   }

   public function getCustomerGoalsList($customerid,$goalid)
   {

    return $this->select('customerorderdetailpretran.customergoalid','g.goalpriority')
      ->join('customerorderdetailpretran','customerorderpretran.customerorderid','=','customerorderdetailpretran.customerorderid')
       ->join('customergoal as g','g.customergoalid','=','customerorderdetailpretran.customergoalid')
      ->join('fund','fund.fundid','=','customerorderdetailpretran.fundid')
      ->where('customerorderpretran.customerid',$customerid)
      ->where('customerorderdetailpretran.customergoalid',$goalid)
      ->where('customerorderdetailpretran.status','pending')
      ->groupby('customerorderdetailpretran.customergoalid')
      ->get()
      ->toArray();
   }
   public function InsertCustomerOrderPretran($arr)
    {
      return $this->insertGetId($arr);
    }
   public function InsertCustomerOrderDetailsPretran($arr)
    {
      return $this->insertGetId($arr);
    }
    public function updateCustomerOrderDetailsPretran($orderno,$customerid)
    {

      $data['orderstatus'] = "completed";
      return $this->where('orderno','=',$orderno)->where('customerid','=',$customerid)->update($data);
    }
   public function CheckCustomerOrderStatus($id)
    {
      return $this->where('customerid',$id)->where('orderstatus','Pending')->first();
    }

     public function CheckoutCustomerOrderStatus($id)
    {
      $arr['orderstatus'] = "confirmed";
      return $this->where('customerid',$id)->update($arr);
    }

    public function CheckFundExists($customerid,$goalid,$fundid)
    {
      return $this->join('customerorderdetailpretran as cd','customerorderpretran.customerorderid','=','cd.customerorderid')
      ->where('customerid',$customerid)->where('cd.customergoalid',$goalid)->where('cd.fundid',$fundid)->first();
    }

      public function getFundValue($customerid,$goalid,$fundid,$purchasetype)
    {
      return $this->select('cd.sipamount','cd.lumpsumamount')->join('customerorderdetailpretran as cd','customerorderpretran.customerorderid','=','cd.customerorderid')
      ->where('customerid',$customerid)->where('cd.customergoalid',$goalid)->where('cd.fundid',$fundid)->where('cd.purchasetype',$purchasetype)->first();
    }

    public function CheckFundExistsInvest($customerid,$goalid,$fundid,$purchasetype)
    {
      return $this->join('customerorderdetailpretran as cd','customerorderpretran.customerorderid','=','cd.customerorderid')
      ->where('customerid',$customerid)->where('cd.customergoalid',$goalid)->where('cd.fundid',$fundid)->where('cd.purchasetype','=',$purchasetype)->where('cd.status','=','pending')->first();
    }

}
