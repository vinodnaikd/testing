<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable =
    [
        'product_name',
        'product_id',
        'product_quantity',
        'product_sum',
        'product_cost',
    ];
}
