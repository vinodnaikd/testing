<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetRebalancing extends Model
{
	protected $table = "rebalancing";
  protected $fillable =
[
   'Assets',
   'current allocation INR',
   'current allocation %',
   'our recommendation INR',
   'our recommendation %',
   'your allocation INR',
   'your allocation %',
];
public $timestamps = false;
	public function addAssetsRebalancing($arr) {
	    
	    return $this->insertGetId($arr);
	}
	public function updateAssetsRebalancing($arr,$id) {
	    
	    return $this->where('rbl_id',$id)->update($arr);
	}
	public function getAssetRebalancingData($goalid)
	{
		return $this->where('goalid',$goalid)->get()->toArray();
	}
	
}
