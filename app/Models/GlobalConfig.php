<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalConfig extends Model
{
     protected $table = "globalconfig";
     protected $fillable =
  [
      'inflation',
  ];
         public function getGlobalValues($Id)
    {
        return $this->get()->toArray();
    }
}
