<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundPerformance extends Model
{
 protected $table = 'customerfunddetailposttran';
  protected $fillable =
    [
        'customerid',
        'funddataid',
        'purchasetype',
        'customerfundid',
        'fundid',
        'transactiondate',
        'units',
        'purchasenavvalue',
        'purchasevalue',
        'investmentamount',
        'transactionstatus',
        'transactionrefcode',
        'remarks'
    ];
   public $timestamps = false;
   
    public function InsertCustomerFundDetailPostTran($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
     public function UpdateCustomerFundDetailPostTran($arr,$Id)
    {
        return $this->where('funddetailid','=',$Id)->update($arr);
    }
    
    public function getCustomerFundDetailPostTran($Id)
    {
        return $this->where('funddetailid',$Id)->get()->toArray();
    }

   
    public function getCustomerSumInvestmentPostTran($customerId)
    {
        return $this->where('customerid',$customerId)->sum('investmentamount');
    }

    public function getCustomerPostTransLogs($customerId)
    {
        return $this->select('f.orderno','customerfunddetailposttran.investmentamount','d.purchasetype','f.customergoalid','fd.fundname','fc.assettype','g.goalname')
                    ->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)->get()->toArray();

    }
}
