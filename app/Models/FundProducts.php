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

    public function getFundProducts($fundclsid,$isnrielligble)
    {
    	//Add query inactive = 1
        return $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->where('fundclassid',$fundclsid)->orderby('rank')->get()->toArray();
    }

    public function getFundProductsDetails($fundid,$isnrielligble)
    {
        //Add query inactive = 1
        return $this->join('mf_return','mf_return.schemecode','=','fund.fundid')
        ->join('fundclass AS fc','fc.fundclassid','=','fund.fundclassid')
        ->join('globalnavcurrvalue AS g','g.fundid','=','fund.fundid')
        ->join('scheme_details AS sd','sd.schemecode','=','fund.fundid')
        ->where('fund.fundid',$fundid)->orderby('rank')->get()->first();
    }
}
