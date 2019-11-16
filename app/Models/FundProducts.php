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
            $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->leftJoin('scheme_details AS sd','sd.schemecode','=','fund.fundid')
            ->where('fundclassid',$fundclsid)->where('fund.isnrieligible',$isnrielligble)->orderby('rank')->take(5)->get()->toArray();
        }
        else
        {
            $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->Join('scheme_details AS sd','sd.schemecode','=','fund.fundid')->join('mf_sip AS s','s.schemecode','=','fund.fundid')->where('frequency','=','Monthly')->where('fundclassid',$fundclsid)->take(5)->get()->toArray();//->orderby('rank')
        }

        return $fundData;
        
    }

    public function getFundProductsDetails($fundid,$isnrielligble)
    {
        //Add query inactive = 1
        return $this->select('fc.*','fund.fundid','fund.fundname','sd.fund_mgr1 as fundmanager','g.nav','g.currdate as navdate', 'sl.entryload','sl.exitload','mf.52weekhhigh','mf.52weeklow','sd.mininvt as mininvestment',
'sd.inc_invest as mintopup','sd.sip','sd.stp','mf_return.6monthret','mf_return.1yrret','mf_return.3yearet','sd.s_name','sp.aum','mr.sd_y as standarddeviation','mr.beta_y as beta','jalpha_y as alpha','mr.sharpe_y as sharpe',
'amr.turnover_ratio as portfolioratio','er.exratio as expenseratio')
        ->join('mf_return','mf_return.schemecode','=','fund.fundid')
        ->join('fundclass AS fc','fc.fundclassid','=','fund.fundclassid')
        ->join('globalnavcurrvalue AS g','g.fundid','=','fund.fundid')
        ->leftJoin('scheme_details AS sd','sd.schemecode','=','fund.fundid')
        ->join('navhist_hl AS mf','mf.schemecode','=','fund.fundid')
        ->join('scheme_paum AS sp','sp.schemecode','=','fund.fundid')
        ->leftJoin('Schemeload As sl','sl.schemecode','=','fund.fundid')
        ->join('mf_ratio AS mr','mr.schemecode','=','fund.fundid')
        ->join('avg_maturity AS amr','amr.schemecode','=','fund.fundid')
        ->join('expenceratio AS er','er.schemecode','=','fund.fundid')
        ->where('fund.fundid',$fundid)->orderby('rank')->get()->first();
    }
}
