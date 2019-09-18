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
}
