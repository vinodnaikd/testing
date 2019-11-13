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
  public $timestamps = false;
    public function InsertCustomerRiskProfile($arr)
    {
      return $this->insertGetId($arr);
    }
    public function UpdateCustomerRiskProfile($Id,$arr)
    {
      return $this->where('riskprofileid','=',$Id)->update($arr);
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
    public function getSubmittedOptions($qid,$customerid) {
    
    return $this->select('optionid','riskprofileid')->where('customerid',$customerid)->where('questionid',$qid)->get()->first();
    }
}
