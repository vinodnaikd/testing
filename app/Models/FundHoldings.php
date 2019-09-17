<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundHoldings extends Model
{
	protected $table = "mf_portfolio";
  protected $fillable =
[
    'holdingid',
    'holdingname',
    'fund_id',
    'holdpercentage',
    'schemecode'
];
public function getFundHoldings($fundid)
    {
    	
        $fundData = $this->where('schemecode',$fundid)->orderby('holdpercentage')->take(10)->get()->toArray();
    	return $fundData;
        
    }
}
