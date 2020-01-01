<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'sso';
  protected $fillable =
    [
        'username',
        'email',
        'mobileno',
        'password',
        'applicationid',
        'transcation_password'
    ];
  public $timestamps = false;
    public function InsertUser($arr)
    {
       return $this->insertGetId($arr);
        
    }
     public function setUserTranscationPassword($txnpassword,$userId)
    {
       return $this->where('userid','=',$userId)->update($txnpassword);
        
    }
     public function UpdateUser($arr,$Id)
    {
        return $this->where('userid','=',$Id)->update($arr);
    }
    public function UpdateUserPassword($arr,$email)
    {
        return $this->where('email','=',$email)->update($arr);
    }
    public function getUserDetails($email,$password)
    {
//        dd($password);
        return $this->where('email',$email)->where('password',$password)->get()->first();
    }
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }

    public function OTPVerify($email,$otp)
    {
    return $this->where('email','=',$email)->where('otp','=',$otp)->get()->first();
    }

      public function getUserInformationDetails($customerid)
    {
//        dd($password);
        return $this->join('customer as c','c.userid','sso.userid')
        ->join('customeraddress as ca','ca.customerid','c.customerid')
        ->join('customerdetail as cd','cd.customerid','c.customerid')
        ->join('customerbank as cb','cb.customerid','c.customerid')
        ->where('c.customerid',$customerid)
        ->get()
        ->first();
    }

}
