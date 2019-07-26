<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardRecords extends Model
{
  protected $fillable =
   [
       'total_lumpsum_amount',
       'sip_per_month',
       'date_time',
       'product_percentage',
       'allocated_funds',
       'follo_start_date',
       'numberof_units',
       'purchase_value',
       'current_value',
       'transaction_activity_log',

   ];
}
