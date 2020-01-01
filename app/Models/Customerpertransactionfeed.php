<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customerpertransactionfeed extends Model
{
    protected $table = "customerpertransactionfeed";

    public $timestamps = false;
    
   public function InsertCustomerOrderDetailsPretran($arr)
    {
      return $this->insertGetId($arr);
    }
}
