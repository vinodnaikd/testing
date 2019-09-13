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
  public $timestamps = false;
    public function InsertCustomer($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
    public function getUserDetails($Id)
    {
        return $this->select('customerid')->where('userid','=',$Id)->get()->toArray();
    }
    
       public function getUserDetailsrow($Id)
    {
        return $this->select('customerid')->where('userid','=',$Id)->get()->first();
    }
     public function getUserCustomerDetails($Id)
    {
        return $this->join('sso as s','s.userid','=','customer.userid')
                    ->join('events_notify as e','e.userid','=','s.userid')
                    ->where('customer.userid','=',$Id)->get()->first();
    }

    public function UpdateCustomer($arr,$Id)
    {
        return $this->where('customerid','=',$Id)->update($arr);
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
}
