<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllocateDebuttabl extends Model
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
