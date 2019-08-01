<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
     protected $table = 'customer';
  protected $fillable =
    [
        'email',
        'userid',
        'mobile',
        'advisorid',
        'accountmanagerid'
    ];
  
    public function InsertCustomer($arr)
    {
//      dd($arr);
       return $this->insertGetId($arr);
        
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
}
