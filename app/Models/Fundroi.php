<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundroi extends Model
{
  protected $fillable =
[
   'standereddeviation',
   'beta',
   'alpha',
   'r-squared',
   'shapre',
   'portfolioturnover',
   'expanseratio',
   'fund_id',
];
}
