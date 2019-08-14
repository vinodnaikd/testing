<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
      protected $table = "customerdocument";
      protected $fillable =
[
    'customerid',
    'documenttypeid',
    'documentname',
    'documentpath',
    ''
];
}
