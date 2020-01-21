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
        ->where('customerfunddetailposttran.customerid',$customerId)
        ->groupby('customerfunddetailposttran.fundid')
        ->get()->toArray();
        return $records;
    }

        public function getCustomerAssets($goalId)
    {
        
        return $this->select('fc.assettype','fc.fundclassid')->join('fund as f','f.fundid','=','customerfunddetailposttran.fundid')
        ->join('fundclass as fc','fc.fundclassid','=','f.fundclassid')
        ->where('customerfunddetailposttran.customergoalid',$goalId)
        ->groupby('fc.assettype')
        ->get()->toArray();
    }

    public function getCustomerPostTransLogs($customerId)
    {
        return $this->select('f.orderno','customerfunddetailposttran.investmentamount','d.purchasetype','f.customergoalid','fd.fundname','fc.assettype','g.goalname')
                    ->join('customerfunddataposttran as d','d.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('customerfundposttran as f','f.customerfundid','=','d.customerfundid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)
                    ->orderBy('customerfunddetailposttran.transactiondate','DESC')
                    ->take(5)
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
                    ->where('CG.customergoalid','!=','')
                    ->groupby('customerfunddetailposttran.customergoalid')->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

     public function getCustomerWealthGoals($customerid,$goalId)
    {
        return $this->select('CG.customergoalId','CG.goalname','CG.futurecost',DB::raw('sum(customerfunddetailposttran.units * GC.NAV) as totalcurrentvalue'),'CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount','CG.timeframe')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('CG.CustomerGoalId','CG.GoalName','CG.FutureCost','CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount')->orderBy('CG.goalpriority','ASC')
                    ->take(1)->get()->toArray();
    }

    public function getCustomerWealthGoalsAllocate($customerid)
    {
        return $this->select('CG.customergoalId','CG.goalname','CG.futurecost',DB::raw('sum(customerfunddetailposttran.units * GC.NAV) as totalcurrentvalue'),DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS investmentvalue'),'CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount','CG.timeframe','CG.goalcost')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->groupby('customerfunddetailposttran.Customergoalid')->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

        public function getCustomerWealthAllocate($customerid,$wealthid)
    {
        return $this->select(DB::raw('sum(customerfunddetailposttran.units * GC.NAV) as totalcurrentvalue'),DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS investmentvalue'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$wealthid)
                    ->get()->toArray();
    }

            public function getCustomerLumpsumSipData($goalId,$purchasetype)
    {
        return $this->select(DB::raw('sum(customerfunddetailposttran.purchasevalue) as lum_sip'))
                    /*->join('customerfundposttran as p','p.customergoalid','=','customerfunddetailposttran.customergoalid')*/
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('customerfunddetailposttran.purchasetype',$purchasetype)
                    ->groupby('customerfunddetailposttran.fundid')
                    ->get()->first();
    }

    public function getGoalsSummaryListWithGoalId($goalId)
    {
        return $this->select('CG.customergoalId','CG.goalname','CG.futurecost','CG.goalpriority','CG.timeframe','fp.sipamount','fp.lumpsumamount','CG.createdutcdatetime')
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

    public function getGoalsSummaryListWithGoalIdAndAsset($goalId,$asset)
    {
        /* return $this->select('fc.AssetType',DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS TotalInvestmentValue'),DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) AS TotalCurrentValue'),DB::raw('((SUM(customerfunddetailposttran.units * GC.NAV) - SUM(customerfunddetailposttran.purchasevalue))*100.00/SUM(customerfunddetailposttran.purchasevalue))as Growth'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('customerfunddetailposttran.customerid','fc.assettype')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();*/
                    return $this->select('fc.AssetType',DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS TotalInvestmentValue'),DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) AS TotalCurrentValue'),DB::raw('((SUM(customerfunddetailposttran.units * GC.NAV) - SUM(customerfunddetailposttran.purchasevalue))*100.00/SUM(customerfunddetailposttran.purchasevalue))as Growth'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('fc.assettype',$asset)
                    ->groupby('customerfunddetailposttran.customerid','fc.assettype')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->first();
    }

    public function getGoalsSummaryListWithGoalIdAndAssetProducts($goalId,$asset)
    {
                    return $this->select('fd.fundname','fd.fundid')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as fp','fp.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('fc.assettype',$asset)
                    ->groupby('customerfunddetailposttran.fundid')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
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
                    //->where('fc.assettype',$asset)
                    ->groupby('fc.assettype')
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

    public function getGoalsSummaryFundsListWithGoalIdNew($goalId,$fundclassid)
    {
        return $this->select('fc.assettype','fd.fundname','fd.fundid','CFD.purchasetype',
'CFD.startdate',DB::raw('SUM(customerfunddetailposttran.purchasevalue) AS investmentvalue'),DB::raw('SUM(customerfunddetailposttran.units) AS units'),DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) as currentvalue'),DB::raw('((SUM(customerfunddetailposttran.units * GC.NAV) - SUM(customerfunddetailposttran.purchasevalue))*100.00/SUM(customerfunddetailposttran.purchasevalue))as Growth'))
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as CFD','CFD.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('fc.fundclassid',$fundclassid)
                    ->groupby('customerfunddetailposttran.fundid','fc.assettype','fd.fundname','CFD.purchasetype','CFD.StartDate','GC.NAV')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

public function getUserGoalsSummaryFundsListWithGoalId($customerid,$goalId,$asset)
    {
        return $this->select('fc.assettype','fd.fundname','fd.fundclassid','fd.fundid')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customergoal as CG','CG.customergoalid','=','customerfunddetailposttran.customergoalid')
                    ->join('customerfunddataposttran as CFD','CFD.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('fund as fd','fd.fundid','=','GC.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('fc.assettype',$asset)
                    ->groupby('customerfunddetailposttran.fundid','fc.assettype')
                    //->orderBy('CG.goalpriority','ASC')
                    ->get()->toArray();
    }

    public function getCustomerGoalsFundsAssets($customerid,$goalId)
    {
        return $this->select('fc.fundclassid','fc.assettype')->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('fund as f','f.fundid','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fc.fundclassid','=','f.fundclassid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('fc.fundclassid')
                    ->get()
                    ->toArray();
    }

    public function getCustomerGoalsFundProducts($customerid,$goalId,$fundclassid)
    {
        return $this->select(DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) as currentvalue'),'customerfunddetailposttran.units','customerfunddetailposttran.purchasevalue','f.fundid','f.fundclassid','f.fundname','customerfunddetailposttran.folionumber')->join('fund as f','f.fundid','=','customerfunddetailposttran.fundid')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('mf_return','mf_return.schemecode','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fc.fundclassid','=','f.fundclassid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->where('fc.fundclassid',$fundclassid)
                    ->groupby('customerfunddetailposttran.fundid')
                    ->get()
                    ->toArray();
    }

     public function getCustomerRedeemFundProducts($customerid,$goalId)
    {
        return $this->select(DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) as currentvalue'),'customerfunddetailposttran.units','customerfunddetailposttran.purchasevalue','f.fundid','f.fundclassid','f.fundname','customerfunddetailposttran.purchasetype','fd.sipamount','customerfunddetailposttran.folionumber')->join('fund as f','f.fundid','=','customerfunddetailposttran.fundid')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customerfunddataposttran as fd','fd.funddataid','=','customerfunddetailposttran.funddataid')
                    ->join('mf_return','mf_return.schemecode','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fc.fundclassid','=','f.fundclassid')
                    ->where('customerfunddetailposttran.customerid',$customerid)
                    ->where('customerfunddetailposttran.customergoalid',$goalId)
                    ->groupby('f.fundid')
                    ->get()
                    ->toArray();
    }


   //Reports Query

    //TaxationReport
    public function getCustomerTaxationReport($customerId,$fromDate,$toDate)
    {
        return $this->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)
                    ->whereBetween('customerfunddetailposttran.transactiondate', [$fromDate, $toDate])
                    ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                    ->take(10)
                    ->get()
                    ->toArray();

    }
    //Portfolio detailed


    public function getCustomerPortfolioDetailed($customerId,$fromDate,$toDate)
    {
        return $this->join('customerfunddataposttran as d','d.customerfundid','=','customerfunddetailposttran.customerfundid')
  ->where('d.customerid',$customerId)
  ->groupby('customerfunddetailposttran.fundid','customerfunddetailposttran.purchasetype')
                    // ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    // ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    // ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    // ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    //
                    // ->whereBetween('customerfunddetailposttran.transactiondate', [$fromDate, $toDate])
                    // ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                    // ->take(10)
                    ->get()
                    ->toArray();

    }
//Account Statement
public function getCustomerAccountStatement($customerId,$fromDate,$toDate)
{
    return $this->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                ->where('customerfunddetailposttran.customerid',$customerId)
                ->whereBetween('customerfunddetailposttran.transactiondate', [$fromDate, $toDate])
                ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                ->take(10)
                ->get()
                ->toArray();


    }

//Portfolio Summary Report

    public function getCustomerPortfolioSummaryReport($fundid,$fromDate,$toDate)
    {

      return $this->join('fund as d','d.fundid','=','customerfunddetailposttran.fundid')
->where('customerfunddetailposttran.fundid',23)
                    ->get()
                    ->toArray();
    }
    //SIP summary
    public function getCustomerSipSummary($customerId,$fromDate,$toDate)
    {
        return $this->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('mf_sip as ms','ms.schemecode','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)
                    ->where('customerfunddetailposttran.purchasetype','=','S')
                    ->where('ms.frequency','=','Monthly')
                    ->whereBetween('customerfunddetailposttran.transactiondate', [$fromDate, $toDate])
                    ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                    ->take(10)
                    ->get()
                    ->toArray();

    }
 public function getModifiedCustomerSipSummary($customerId)
    {
        return $this->select('customerfunddetailposttran.purchasetype','fd.fundid','fd.fundname',DB::raw('SUM(customerfunddetailposttran.units * GC.NAV) as currentvalue'),'g.customergoalid','g.goalname','g.goalpriority','customerfunddetailposttran.transactiondate')
                    ->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                    ->join('globalnavcurrvalue as GC','GC.fundid','=','customerfunddetailposttran.fundid')
                    ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                    ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                    ->join('mf_sip as ms','ms.schemecode','=','customerfunddetailposttran.fundid')
                    ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                    ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                    ->where('customerfunddetailposttran.customerid',$customerId)
                    ->where('customerfunddetailposttran.purchasetype','=','S')
                    ->where('ms.frequency','=','Monthly')
                    ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                    ->take(10)
                    ->get()
                    ->toArray();

    }

    //Redemption report
    public function getCustomerRedemptionReport($customerId,$fromDate,$toDate)
    {
      return $this->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
->where('customerfunddetailposttran.customerid',$customerId)
                    ->get()
                    ->toArray();
}
//Rebalancing report
public function getCustomerRebalancingReport($customerId,$fromDate,$toDate)
{
    return $this->join('customerfunddataposttran as d','d.customerid','=','customerfunddetailposttran.customerid')
                ->join('customerfundposttran as f','f.customerid','=','d.customerid')
                ->join('fund as fd','fd.fundid','=','customerfunddetailposttran.fundid')
                ->join('mf_sip as ms','ms.schemecode','=','customerfunddetailposttran.fundid')
                ->join('fundclass as fc','fd.fundclassid','=','fc.fundclassid')
                ->join('customergoal as g','g.customergoalid','=','f.customergoalid')
                ->where('customerfunddetailposttran.customerid',$customerId)
                ->where('customerfunddetailposttran.purchasetype','=','S')
                ->where('ms.frequency','=','Monthly')
                ->whereBetween('customerfunddetailposttran.transactiondate', [$fromDate, $toDate])
                ->orderBy('customerfunddetailposttran.customerfundid','DESC')
                ->take(10)
                ->get()
                ->toArray();

}
}
