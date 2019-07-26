<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundHoldings extends Model
{
  protected $fillable =
[
    'holdingid',
    'holdingname',
    'fund_id',
];
}
