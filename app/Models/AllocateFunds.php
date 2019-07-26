<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllocateFunds extends Model
{
  protected $fillable =
[
    'user_id',
    'equity_funds',
    'debut_funds',
    'goal_name',
    'total_amount',
    'date_time',
  ];
}
