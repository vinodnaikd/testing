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
}
