<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GlobalCurrNav extends Model
{
     protected $table = "globalnavcurrvalue";
     protected $fillable =
  [
      'inflation',
  ];
         public function getCurrentNavValueByFundId($fundid)
    {
        return $this->where('fundid',$fundid)->get()->first();
    }
}
