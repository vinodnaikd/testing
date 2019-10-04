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
  public $timestamps = false;
    public function InsertCustomerBankDetails($arr)
    {
       return $this->insertGetId($arr);
        
    }
    public function getCustomerBankDetails($Id)
    {
        return $this->where('customerid','=',$Id)->get()->toArray();
    }
     public function getCustomerBankDetailsByUserId($Id)
    {
        return $this->select('customerid')->where('userid','=',$Id)->get()->toArray();
    }
    public function UpdateCustomerBankDetails($arr,$Id)
    {
        return $this->where('customerbankid','=',$Id)->update($arr);
    }
     public function getCustomerBankDetailsById($Id)
    {
        return $this->where('customerbankid','=',$Id)->get()->toArray();
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
    public function getUserinfo($customerId,$fromDate,$toDate)
    {
      return $this->join('customerdetail as x','x.customerid','=','customerbank.customerid')

      ->where('customerbank.customerid',$customerId)
      ->get()
      ->toArray();

    }
}
