<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetRebalancing extends Model
{
  protected $fillable =
[
   'Assets',
   'current allocation INR',
   'current allocation %',
   'our recommendation INR',
   'our recommendation %',
   'your allocation INR',
   'your allocation %',
];
}
