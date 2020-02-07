<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class DashboardRecordsInfo extends Model
{
	protected $table = "goals_assets_allocation";
  protected $fillable =
[
   'goalid',
   'customerid',
   'asset',
   'asset_value',
   'purchase_type'
];
public $timestamps = false;
   
    public function AddGoalsAssestsAllocation($arr)
    {
       return $this->insertGetId($arr);
        
    }
    public function UpdateGoalsAssestsAllocation($arr,$goal_ass_id)
    {
       return $this->where('goal_ass_id',$goal_ass_id)->update($arr);;
        
    }

    public function updateGoalAssetStatus($customerid,$goal_id,$puctype,$lumsip)
    {
       return $this->where('customerid',$customerid)
       ->where('goalid',$goal_id)
       ->where('purchase_type',$puctype)
       ->update($lumsip);
    }

    public function getGoalsAllocationDetails($customerid,$goalid)
    {
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->get()->toArray();
    }

    public function getCheckedGoalsAllocationDetails($customerid,$goalid)
    {
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('lum_sip_type','checked')->get()->toArray();
    }

        public function getGoalsAllocationLumSipDetails($customerid,$goalid,$purchasetype,$asset)
    {
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('purchase_type',$purchasetype)->where('asset',$asset)->get()->first();
    }

    public function getGoalsAllocationDetailsForRebalancing($customerid,$goalid)
    {
        return $this->join('customergoal as g','g.customergoalid','=','goals_assets_allocation.goalid')->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->groupby('goals_assets_allocation.asset')->get()->toArray();
    }

    public function getGoalsAllocationTypesDetails($customerid,$goalid)
    {
        return $this/*->join('customergoal as g','g.customergoalid','=','goals_assets_allocation.goalid')*/->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->groupby('goals_assets_allocation.purchase_type')->get()->toArray();
    }

    
    public function getWealthAllocationAssets($customerid,$goalid)
    {
        // dd($assetscat);
        return $this->select('c.assettype','goals_assets_allocation.asset')
        ->join('fundclass as c','goals_assets_allocation.asset','=','c.asset')
         ->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->groupby('c.assettype')->get()->toArray();
    }

    public function getWealthAssets($goalid)
    {
        // dd($assetscat);
        return $this->select('c.assettype','goals_assets_allocation.asset')
        ->join('fundclass as c','goals_assets_allocation.asset','=','c.asset')
         ->where('goals_assets_allocation.goalid',$goalid)->groupby('c.assettype')->get()->toArray();
    }

    public function getWealthAssetsTypes($goalid)
    {
        // dd($assetscat);
        return $this->select('c.assettype','goals_assets_allocation.asset')
        ->join('fundclass as c','goals_assets_allocation.asset','=','c.asset')
        ->where('goals_assets_allocation.goalid',$goalid)->groupby('c.asset')->get()->toArray();
    }


        public function getWealthAllocationAssetstypes($customerid,$goalid,$asset)
    {
        return $this->select('c.assettype','goals_assets_allocation.asset')
        ->join('fundclass as c','goals_assets_allocation.asset','=','c.asset')
         ->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->where('c.assettype',$asset)->groupby('c.asset')->get()->toArray();
    }

    public function getWealthAllocationAssetstypesNew($goalid,$asset)
    {
        return $this->select('c.assettype','goals_assets_allocation.asset')
        ->join('fundclass as c','goals_assets_allocation.asset','=','c.asset')
         ->where('goals_assets_allocation.goalid',$goalid)->where('c.assettype',$asset)->groupby('c.asset')->get()->toArray();
    }

     public function getGoalsAllocationDetailsForFunds($customerid,$goalid,$asset)
    {
        return $this->join('fundclass as c','c.asset','=','goals_assets_allocation.asset')->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->where('goals_assets_allocation.asset',$asset)->where('goals_assets_allocation.asset_value','!=','0')->groupby('goals_assets_allocation.asset')->get()->first();
    }

    public function getGoalsDetailsForFunds($goalid,$asset)
    {
        return $this->join('fundclass as c','c.asset','=','goals_assets_allocation.asset')->where('goals_assets_allocation.goalid',$goalid)->where('goals_assets_allocation.asset',$asset)->where('goals_assets_allocation.asset_value','!=','0')->groupby('goals_assets_allocation.asset')->get()->first();
    }

    public function getGoalsAllocationForFunds($customerid,$goalid,$asset)
    {
        return $this/*->join('fundclass as c','c.asset','=','goals_assets_allocation.asset')*/->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->where('goals_assets_allocation.asset',$asset)->where('goals_assets_allocation.asset_value','!=','0')->groupby('goals_assets_allocation.asset')->get()->first();
    }

    public function getGoalsAssetsAllocationDetails($customerid,$goalid,$asset)
    {
    	// dd($asset);
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('asset',$asset)->get()->first();
    }

    public function getGoalsAssetsAllocationDetailsSipLum($customerid,$goalid,$asset,$type)
    {
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('asset',$asset)->where('purchase_type',$type)->get()->first();
    }

       public function getWealthAssetsAllocationDetailsSipLum($customerid,$goalid,$assettype,$asset,$type)
    {
      // DB::enableQueryLog();
        $query = $this->join('fundclass','fundclass.asset','=','goals_assets_allocation.asset')->where('customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->where('fundclass.assettype',$assettype)->where('goals_assets_allocation.purchase_type',$type)->where('goals_assets_allocation.asset',$asset)->groupby('goals_assets_allocation.asset')->get()->first();
        // print_r(DB::getQueryLog());
        return $query;
    }

  /*  public function getWealthAssetsAllocationDetailsSipLum($customerid,$goalid,$assettype,$asset,$type)
    {
        return $this->join('fundclass as c','c.asset','=','goals_assets_allocation.asset')->where('customerid',$customerid)->where('goalid',$goalid)->where('c.assettype',$assettype)->where('goals_assets_allocation.asset',$asset)->where('purchase_type',$type)->get()->first();
    }*/
}
