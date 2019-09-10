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
        if($isnrielligble == 1)
        {
            $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')
            ->where('fundclassid',$fundclsid)->where('fund.isnrieligible',$isnrielligble)->orderby('rank')->get()->toArray();
        }
        else
        {
            $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->where('fundclassid',$fundclsid)->orderby('rank')->get()->toArray();
        }

        return $fundData;
        
    }

    public function getFundProductsDetails($fundid,$isnrielligble)
    {
        //Add query inactive = 1
        return $this->select('fc.*','fund.fundid','fund.fundname','sd.fund_mgr1 as fundmanager','g.nav','g.currdate as navdate', 'sl.entryload','sl.exitload','mf.52weekhhigh','mf.52weeklow','sd.mininvt as mininvestment',
'sd.inc_invest as mintopup','sd.sip','sd.stp','mf_return.6monthret','mf_return.1yrret','mf_return.3yearet','sd.s_name','sp.aum')
        ->join('mf_return','mf_return.schemecode','=','fund.fundid')
        ->join('fundclass AS fc','fc.fundclassid','=','fund.fundclassid')
        ->join('globalnavcurrvalue AS g','g.fundid','=','fund.fundid')
        ->leftJoin('scheme_details AS sd','sd.schemecode','=','fund.fundid')
        ->join('navhist_hl AS mf','mf.schemecode','=','fund.fundid')
        ->join('scheme_paum AS sp','sp.schemecode','=','fund.fundid')
        ->leftJoin('Schemeload As sl','sl.schemecode','=','fund.fundid')
        ->where('fund.fundid',$fundid)->orderby('rank')->get()->first();
    }
}
