<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurplusCalculation extends Model
{
  protected $table = "customer_surplus_amount";
  protected $fillable =
[
    'yearly_income',
    'yearly_expenses',
    'total_surplus',
    'surplussetting_id',
];
public $timestamps = false;

	public function InsertCustomerSurplusCalculation($arr)
    {
      return $this->insertGetId($arr);
    }
    public function UpdateCustomerSurplusCalculation($Id,$arr)
    {
      return $this->where('surplussetting_id','=',$Id)->update($arr);
    }
    public function getCustomerSurplusCalculation($Id)
    {
      return $this->where('surplussetting_id',$Id)->first();
    }
    public function getCustomerSurplusCalculationDetails($customerId)
    {
      return $this->where('customerid',$customerId)->get()->first();
    }
    
}
