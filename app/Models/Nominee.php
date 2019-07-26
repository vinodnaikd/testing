<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
  protected $fillable =
    [
        'Name',
        'guardian_name',
        'relationship',
        'nominee_address',
        'nominee_dob',
        'nominee_share',
        'nominee_id',
    ];
}
