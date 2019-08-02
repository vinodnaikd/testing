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
        'applicationid'
    ];
  
    public function InsertUser($arr)
    {
       return $this->insertGetId($arr);
        
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
