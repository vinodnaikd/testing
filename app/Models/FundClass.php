<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundClass extends Model
{
    protected $table = 'fundclass';
  protected $fillable =
    [
    	'fundclassid',
        'name',
        'assettype',
        'category',
        'subcategory',
    ];
   public $timestamps = false;
   
    public function getFundClassAssestType()
    {
        return $this->select('assettype')->groupBy('assettype')->get()->toArray();
    }
    public function getFundClass($assettype)
    {
        return $this->where('assettype',$assettype)->get()->toArray();
    }
    public function getFundClassData($assettype,$inactive=0)
    {
        return $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory')->distinct('fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('assettype',$assettype)->where('fundclass.inactive',$inactive)->get()->toArray();
    }
     public function getCustomerSelectedAssests()
   	{
    return $this->select('fundclass.assettype')->join('fund','fund.fundclassid','=','fundclass.fundclassid')
    			->join('customerorderdetailpretran','customerorderdetailpretran.fundid','=','fund.fundid')->groupBy('fundclass.assettype')->get()->toArray();
	}
	    public function getSearchedMutualFundData($searchData)
   	{
   		//dd($searchData['category']);
     $a = $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory','fund.fundid','fund.fundname','mf_return.incret as AUM','mf_return.1monthret as onem','mf_return.6monthret as sixm','mf_return.1yrret as oney','mf_return.3yearet as threey','5yearret as fivey','mf_return.c_nav as c_nav','mf_return.incdate as incdate')->distinct('fund.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->join('mf_return','mf_return.schemecode','=','fund.fundid');
     if($searchData['category'])
      $a->orWhere('fundclass.category', 'like', '%' . $searchData['category'] . '%');
    if($searchData['subcategory'])
      $a->orWhere('fundclass.subcategory','like', '%' . $searchData['subcategory'] . '%');
    if($searchData['fundhouse'])
      $a->orWhere('fundclass.name', 'like', '%' . $searchData['fundhouse'] . '%');
     return $a->orderBy('fund.rank','asc')->get()->toArray();
	   }

}
