<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskQuestions extends Model
{
    protected  $table = "riskprofile";
    protected $fillable =
    [
        'questionid',
        'customerid',
        'optionid'
    ];
  
    public function InsertCustomerRiskProfile($arr)
    {
      return $this->insertGetId($arr);
    }
    public function getCustomerRiskProfileScore($customerId)
    {
      return $this->join('questionoptions', 'riskprofile.optionid',   '=', 'questionoptions.optionid')
                  ->where('riskprofile.customerid',$customerId)
                  ->sum('questionoptions.score');
    }
    public function getCustomerRiskProfile($customerId)
    {
      return $this->where('riskprofile.customerid',$customerId)->get()->toArray();
    }
}
