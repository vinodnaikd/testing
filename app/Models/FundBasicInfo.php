<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundBasicInfo extends Model
{
  protected $fillable =
    [
        'fundname',
        'Schemename',
        'category',
        'fundmanager',
        'net_aum',
        'returndetails',
        'fund_id',
    ];
}
