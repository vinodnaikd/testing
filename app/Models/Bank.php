<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  protected $fillable =
        [
          'account_num',
            'account_type',
            'full_name',
            'ifsc_code',
            'micr_code',
            'adress',
            'bank_id',

        ];
}
