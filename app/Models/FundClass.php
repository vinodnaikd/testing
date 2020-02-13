<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
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
        return $this->select('assettype','asset')->where('assettype','!=','Hybrid')->where('assettype','!=','Other')->groupBy('assettype')->get()->toArray();
    }
        public function getFundClassAssestTypeNew()
    {
        return $this->select('assettype','asset','asset_category')->where('assettype','!=','Hybrid')->where('assettype','!=','Other')->groupBy('asset')->get()->toArray();
    }

    public function getFundClassSubcategory()
    {
        return $this->select('asset_category','assettype')->where('asset_category','<>', '')->groupBy('asset_category')->orderBy('assettype')->get()->toArray();
    }
    public function getFundClass($assettype)
    {
        return $this->where('assettype',$assettype)->get()->toArray();
    }
        public function getFundIdsAssetClass($asset)
    {
        /*if(empty($asset))
        {
           $asset = "Liquid";
        }*/
        // else

        return $this->where('asset',$asset)->get()->toArray();
    }
    public function getFundClassData($assettype,$inactive=0)
    {
        if($assettype == "Equity")
          $assetcategory = "Equity Largecap";
        if($assettype == "Debt")
          $assetcategory = "Debt Medium";

         $query = $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory','fundclass.asset')->distinct('fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('assettype',$assettype);
         if(isset($assetcategory))
         {
            $query->where('asset_category',$assetcategory);
         }
         return $query->where('fundclass.inactive',$inactive)->groupBy('assettype')->get()->toArray();
    }

     public function getFundClassDataForWealth($assettype,$asset,$inactive=0)
    {
      // print_r($asset);
        $query = $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory','fundclass.asset_category','fundclass.asset')->distinct('fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('asset','!=','')->where('assettype',$assettype)->where('fundclass.inactive',$inactive);
         if($assettype == "Equity")
        {
          foreach ($asset as $key => $value) {
            if($key == 0)
            $query->where('asset',$value['asset']);
            else
            $query->orwhere('asset',$value['asset']);
          }
            /*$query->where('asset_category',"Equity Largecap")->orwhere('asset_category',"Equity Midcap")->orwhere('asset_category',"Equity Smallcap");*/
        }
        if($assettype == "Debt")
        {
          foreach ($asset as $key => $value) {
            if($key == 0)
            $query->where('asset',$value['asset']);
            else
            $query->orwhere('asset',$value['asset']);
          }
          /*$query->where('asset_category',"Debt Long")->orwhere('asset_category',"Debt Medium");*/
        }
        return $query->groupBy('asset')->get()->toArray();//->groupBy('asset')->get()->toArray();
    }

    public function getFundClassSubcategoryData($assetcategory,$inactive=0)
    {
        return $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory')->distinct('fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('asset_category',$assetcategory)->where('fundclass.inactive',$inactive)->get()->toArray();
    }
     public function getSelectedFundClassData($assettype,$inactive=0)
    {
        return $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('assettype',$assettype)->where('fundclass.inactive',$inactive)->groupBy('fundclass.assettype')->get()->toArray();
    }

         public function getSelectedFundClassDataNew($assettype,$fundclassid,$inactive=0)
    {
        return $this->select('fundclass.fundclassid','fundclass.name','fundclass.assettype','fundclass.category','fundclass.subcategory')->join('fund','fund.fundclassid','=','fundclass.fundclassid')->where('assettype',$assettype)->where('fundclass.fundclassid',$fundclassid)->where('fundclass.inactive',$inactive)->groupBy('fundclass.assettype')->get()->toArray();
    }

    public function getCustomerSelectedFundAssestsNew($goalId,$assettype)
    {
    return $this->select('fundclass.assettype','fundclass.fundclassid')
          ->join('fund','fund.fundclassid','=','fundclass.fundclassid')
          ->join('customerfunddetailposttran as d','d.fundid','=','fund.fundid')
          ->where('fundclass.assettype',$assettype)
          ->where('d.customergoalid',$goalId)
          ->groupBy('fundclass.fundclassid')->get()->toArray();
  }
    
     public function getCustomerSelectedAssests($customerid,$goalId)
   	{
    return $this->select('fundclass.assettype','fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')
    			->join('customerorderdetailpretran','customerorderdetailpretran.fundid','=','fund.fundid')
          ->join('customerorderpretran as cp','cp.customerorderid','=','customerorderdetailpretran.customerorderid')
          ->where('cp.customerid',$customerid)
          ->where('customerorderdetailpretran.customergoalid',$goalId)
          ->groupBy('fundclass.assettype')->get()->toArray();
	}

    public function getCustomerWealthSelectedAssests($customerid,$goalId)
    {
    return $this->select('fundclass.assettype','fundclass.fundclassid')->join('fund','fund.fundclassid','=','fundclass.fundclassid')
          ->join('customerorderdetailpretran','customerorderdetailpretran.fundid','=','fund.fundid')
          ->join('customerorderpretran as cp','cp.customerorderid','=','customerorderdetailpretran.customerorderid')
          ->join('goals_assets_allocation as g','g.asset','=','fundclass.asset')
          ->where('cp.customerid',$customerid)
          ->where('customerorderdetailpretran.customergoalid',$goalId)
          ->groupBy('fundclass.assettype')->get()->toArray();
  }

      public function getCustomerWealthSelectedAssestsSumAmount($customerid,$goalId,$assettype,$purchase_type)
    {
    return $this->select('g.asset_value')->join('fund','fund.fundclassid','=','fundclass.fundclassid')
          ->join('customerorderdetailpretran','customerorderdetailpretran.fundid','=','fund.fundid')
          ->join('customerorderpretran as cp','cp.customerorderid','=','customerorderdetailpretran.customerorderid')
          ->join('goals_assets_allocation as g','g.asset','=','fundclass.asset')
          ->where('g.customerid',$customerid)
          ->where('g.purchase_type',$purchase_type)
          ->where('g.goalid',$goalId)
          ->where('fundclass.assettype',$assettype)
          ->groupBy('g.asset')->get()->toArray();
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

      public function getAssetTypeBySubcategory($search)
    {
     return $this->Where('fundclass.subcategory', 'like', '%' . $search . '%')->get()->first();
     }

}
