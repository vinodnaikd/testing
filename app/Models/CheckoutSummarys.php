<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutSummarys extends Model
{
  protected $fillable =
 [
     'product_id',
     'product_totalcost',
     'tax_amount',
     'gross_amount',
     'nav_price',
     'product_name',
     'product_cost',
     'sip_enable'
     
 ];
}
