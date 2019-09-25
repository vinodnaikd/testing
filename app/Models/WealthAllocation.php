<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class WealthAllocation extends Model
{
     protected $table = "customer_wealth_allocation";
  protected $fillable =
[
    'lumpsum_amount',
    'sip_amount',
    'timeframe',
    'customerid',
    'cust_wel_all'
];
 public $timestamps = false;
	public function InsertWealthAllocation($arr) {
	    
	    return $this->insertGetId($arr);
	}

	public function UpdatedWealthAllocation($id,$arr) {
	    
	    return $this->where('cust_wel_all',$id)->update($arr);
	}

	public function getWealthAllocation($id) {
	    
	    return $this->where('customerid',$id)->get()->toArray();
	}

}
