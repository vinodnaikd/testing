<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function getGoalsAllocationDetails($customerid,$goalid)
    {
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->get()->toArray();
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
        return $this->select('goals_assets_allocation.asset as assettype')->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->groupby('goals_assets_allocation.asset')->get()->toArray();
    }

     public function getGoalsAllocationDetailsForFunds($customerid,$goalid,$asset)
    {
        return $this/*->join('customergoal as g','g.customergoalid','=','goals_assets_allocation.goalid')*/->where('goals_assets_allocation.customerid',$customerid)->where('goals_assets_allocation.goalid',$goalid)->where('goals_assets_allocation.asset',$asset)->where('goals_assets_allocation.asset_value','!=','0')->groupby('goals_assets_allocation.asset')->get()->first();
    }

    public function getGoalsAssetsAllocationDetails($customerid,$goalid,$asset)
    {
    	// dd($asset);
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('asset',$asset)->get()->first();
    }

    public function getGoalsAssetsAllocationDetailsSipLum($customerid,$goalid,$asset,$type)
    {
      // dd($asset);
        return $this->where('customerid',$customerid)->where('goalid',$goalid)->where('asset',$asset)->where('purchase_type',$type)->get()->first();
    }
}
