<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
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

    public function getFundProducts($fundclsid,$isnrielligble,$limit,$viewmore)
    {
    	//Add query inactive = 1
        if($isnrielligble == 1)
        {
            $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->leftJoin('scheme_details AS sd','sd.schemecode','=','fund.fundid')
            ->where('fundclassid',$fundclsid)->where('fund.isnrieligible',$isnrielligble)->orderby('rank')->take($limit)->get()->toArray();
        }
        else
        {
            if(!empty($viewmore))
            {
                $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->Join('scheme_details AS sd','sd.schemecode','=','fund.fundid')->join('mf_sip AS s','s.schemecode','=','fund.fundid')->where('frequency','=','Monthly')->where('sd.opt_code','=','1')->where('sd.type_code','=','1')->where('sd.plan','=','6')->orwhere('sd.plan','=','2')->where('sd.status','=','Active')->where('fundclassid',$fundclsid)->get()->toArray();//->orderby('rank')

            }
            else
            {
                $fundData = $this->join('mf_return','mf_return.schemecode','=','fund.fundid')->Join('scheme_details AS sd','sd.schemecode','=','fund.fundid')->join('mf_sip AS s','s.schemecode','=','fund.fundid')->where('frequency','=','Monthly')->where('sd.opt_code','=','1')->where('sd.type_code','=','1')->where('sd.plan','=','6')->where('sd.status','=','Active')->where('fundclassid',$fundclsid)->take($limit)->get()->toArray();//->orderby('rank')
            }

        }

        return $fundData;
        
    }

    public function getFundClassIds()
    {
        return $this->select('fund.fundclassid')->join('mf_return','mf_return.schemecode','=','fund.fundid')->join('fundclass as c','c.fundclassid','=','fund.fundclassid')->Join('scheme_details AS sd','sd.schemecode','=','fund.fundid')->join('mf_sip AS s','s.schemecode','=','fund.fundid')->where('frequency','=','Monthly')->where('sd.opt_code','=','1')->where('sd.type_code','=','1')->where('sd.plan','=','6')->where('sd.status','=','Active')->where('c.asset_category','!=',null)->groupby('c.asset_category')->get()->toArray();
    }
     public function FundRankingUpdate($rank,$fundid)
    {
        return $this->where('fund.fundid','=',$fundid)->update($rank);
    }
    public function getFundProductsByClassId($fundclsid)
    {
        return $this->select(DB::raw('((r.beta_x*0.15) + (r.sharpe_x*0.3) + (r.sd_x*0.2) + (mf_return.3yearet*0.35)) as tot'),'fund.fundid')->join('mf_return','mf_return.schemecode','=','fund.fundid')->Join('scheme_details AS sd','sd.schemecode','=','fund.fundid')->join('mf_sip AS s','s.schemecode','=','fund.fundid')->join('mf_ratio AS r','r.schemecode','=','fund.fundid')->where('frequency','=','Monthly')->where('sd.opt_code','=','1')->where('sd.type_code','=','1')->where('sd.plan','=','6')->where('sd.status','=','Active')->where('fundclassid',$fundclsid)->orderby('tot','Desc')->get()->toArray();
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
