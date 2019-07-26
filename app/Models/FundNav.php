<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundNav extends Model
{
  protected $fillable =
        [
            'navprice',
            'navdate',
            'maxentryload',
            'maxeditload',
            '52weekhigh',
            '52weeklow',
            'minimuminvestment',
            'minimumtopup',
            'sip',
            'stp',
            'sipdate',
            'fund_id',
        ];
}
