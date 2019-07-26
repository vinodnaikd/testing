<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskDashboardRecord extends Model
{
  protected $fillable =
[
    'risk_score',
    'risk_category_ranks',
    'risk_category_grades',
];
}
