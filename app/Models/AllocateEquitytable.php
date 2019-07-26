<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllocateEquitytable extends Model
{
  protected $fillable =
[
    'equityfund',
    'follo_start_date',
    'number_of_units',
    'purchsae value INR',
    'current amount INR',
    'monthly sip INR',
];
}
