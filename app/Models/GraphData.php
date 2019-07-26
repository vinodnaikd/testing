<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphData extends Model
{
  protected $fillable =
  [
      'meta_key_value',
      'value_percentage',
  ];
}
