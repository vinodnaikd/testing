<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoalsAllocation extends Model
{
    protected $table = "goalsallocation";
  protected $fillable =
[
    'startscore',
    'endscore',
    'description',
    'startmonth',
    'endmonth',
    'type'
];
 public $timestamps = false;
 public function getWealthAssestsByRiskScore($score,$start,$end,$type)
    {
    return $this->where('startscore','<=',$score)->where('endscore','>=',$score)->where('startmonth','<=',$start)->where('endmonth','>=',$end)->where('type','=',$type)->get()->first();
    }
}
