<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    protected $table = 'customerdetail';
  protected $fillable =
        [
            'firstname',
            'lastname',
            'dateofbirth',
            'email',
            'customerid',
            'mobileno',
            'occupation',
            'pannumber'

        ];
  public function InsertCustomerDetails($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
}
