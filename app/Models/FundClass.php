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
    public function getFundClassData($assettype)
    {
        return $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory')->distinct('fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('assettype',$assettype)->get()->toArray();
    }
     public function getCustomerSelectedAssests()
   	{
    return $this->select('fundclass.assettype')->join('fund','fund.fundclassid','=','fundclass.fundclassid')
    			->join('customerorderdetailpretran','customerorderdetailpretran.fundid','=','fund.fundid')->groupBy('fundclass.assettype')->get()->toArray();
	}
}
