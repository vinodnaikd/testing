<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
  protected $fillable =
[
    'goal_name',
    'cost_goal',
    'time_frame',
    'future_cost',
    'goal_id',
];
}
