<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable =
        [

            'addressline1',
            'addressline2',
            'city',
            'country',
            'state',
            'pincode',
            'address_id',


        ];
}
