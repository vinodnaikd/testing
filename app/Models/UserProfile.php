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
    
    public function getUserDetails($email,$password)
    {
        return $this->where('email',$email)->where('password',$password)->get()->toArray();
    }
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }

}
