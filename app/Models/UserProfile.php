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
//      dd($arr);
       return $this->insertGetId($arr);
        
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
//  
  
  
//   protected $fillable =
//    [
//        'firstname',
//        'lastname',
//        'dob',
//        'email',
//        'customer_id',
//        'agent_id',
//        'salutation_name',
//        'mobile_number',
//        'country_birth',
//        'residential_status',
//        'marital_status',
//        'occupation',
//        'pan_number',
//        'income_group',
//        'political_affiliations',
//        'userprofile_id',
//        'user_status',
//    ];
}
