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
    
}
