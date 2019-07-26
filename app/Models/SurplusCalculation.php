<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurplusCalculation extends Model
{
  protected $fillable =
[
    'yearly_income',
    'yearly_expances',
    'total_surplus',
    'surplussetting_id',
];
}
