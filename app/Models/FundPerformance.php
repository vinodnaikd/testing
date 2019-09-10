<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
        $records['purchase'] = $this->where('customerid',$customerId)->sum('purchasevalue');
        $records['purchase1'] = $this->select('customerfunddetailposttran.customerid','units','g.nav','c.startdate')
        ->join('globalnavcurrvalue as g','g.fundid','=','customerfunddetailposttran.fundid')
        ->join('customerfundposttran as c','c.customerfundid','=','customerfunddetailposttran.customerfundid')
        ->where('customerfunddetailposttran.customerid',$customerId)->get()->toArray();
        return $records;
    }

    public function getCustomerPostTransLogs($customerId)
    {
        return $this->select('f.orderno','customerfunddetailposttran.investmentamount','d.purchasetype','f.customergoalid','fd.fundname','fc.assettype','g.goalname')
                    ->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)
                    ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                    ->take(10)
                    ->get()
                    ->toArray();

    }

    public function getCustomerGoals($customerid)
    {
        return $this->select('CG.customergoalId','CG.goalname','CG.futurecost',DB::raw('sum(customerfunddetailposttran.units * GC.NAV) as totalcurrentvalue'),'CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->groupby('CG.CustomerGoalId','CG.GoalName','CG.FutureCost','CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount')->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

    public function getGoalsSummaryListWithGoalId($goalId)
    {
        return $this->select('CG.customergoalId','CG.goalname','CG.futurecost','CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('customerfunddetailposttran.customerid','CG.CustomerGoalId','CG.GoalName','CG.FutureCost','CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount','fc.assettype')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->first();
    }

     public function getGoalsSummaryGraphListWithGoalId($goalId)
    {
        return $this->select('fc.AssetType',DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS TotalInvestmentValue'),DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) AS TotalCurrentValue'),DB::raw('((SUM(customerfunddetailposttran.units * GC.NAV) - SUM(customerfunddetailposttran.purchasevalue))*100.00/SUM(customerfunddetailposttran.purchasevalue))as Growth'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('customerfunddetailposttran.customerid','fc.assettype')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

     public function getGoalsSummaryFundsListWithGoalId($goalId)
    {
        return $this->select('fc.assettype','fd.fundname','CFD.purchasetype',
'CFD.startdate',DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS investmentvalue'),DB::raw('SUM(customerfunddetailposttran.units) AS units'),DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) as currentvalue'),DB::raw('((SUM(customerfunddetailposttran.units * GC.NAV) - SUM(customerfunddetailposttran.purchasevalue))*100.00/SUM(customerfunddetailposttran.purchasevalue))as Growth'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as CFD','CFD.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('customerfunddetailposttran.fundid','fc.assettype','fd.fundname','CFD.purchasetype','CFD.StartDate','GC.NAV')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }
}
