<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllocateInvestment extends Model
{
  protected $fillable =
[
    'purchase value INR',
    'current value INR',
    'goal future value INR',
    'goal_name',
    ' time_period',
    'select allocation mode for this model',
];
}
