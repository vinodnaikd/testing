<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundRecord extends Model
{
  protected $fillable =
   [
       'fundsname',
       'aasetsundermanagement',
       'inceptiondate',
       'currentnav',
       'exitload',
       '1/2yrreturn',
       '1yrreturn',
       '3yrreturn',
       '5yrreturn',
       'fund_description',
       'fund_id',
   ];
}
