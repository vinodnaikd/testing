<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundPerformance extends Model
{
  protected $fillable =
[
    'ytd',
    '6months',
    '1year',
    '3year',
    'fund_id',
];
}
