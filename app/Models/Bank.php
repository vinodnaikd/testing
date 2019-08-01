<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'customerbank';
  protected $fillable =
        [
            'accno',
            'acctype',
            'full_name',
            'ifsccode',
            'micr_code',
            'adress1',
            'bankname',
            'branchname',
            'address2',
            'address3',
            'cityid',
            'countryid',
            'pincode',
            'customerid'

        ];
  
    public function InsertCustomerBankDetails($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
}
