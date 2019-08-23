<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundProducts extends Model
{
    protected $table = 'fund';
  protected $fillable =
    [
    	'fundid',
        'fundcode',
        'fundname',
        'amccode',
    ];
   public $timestamps = false;

    public function getFundProducts($fundid,$isnrielligble)
    {
    	//Add query inactive = 1
        return $this->where('fundclassid',$fundid)->get()->toArray();
    }
}
