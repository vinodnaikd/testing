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
            'pannumber',
            'residential_status',
            'income_group',
            'political_affiliations',
            'country_birth'

        ];
    public $timestamps = false;
    public function InsertCustomerDetails($arr)
    {
       return $this->insertGetId($arr);
        
    }
    public function getCustomerDetails($Id)
    {
        return $this->where('customerid','=',$Id)->orderby('modifiedutcdatetime')->get()->toArray();
    }
    
   public function getCustomerDetailsByUserId($Id)
    {
        return $this->select('customerid')->where('userid','=',$Id)->get()->toArray();
    }

     public function getCustomerIsNRI($Id)
    {
        return $this->select('customerdetail.customerid','residential_status')->join('customer as c','c.customerid','=','customerdetail.customerid')->where('userid','=',$Id)->get()->first();
    }
    
    public function UpdateCustomerDetails($arr,$Id)
    {
        return $this->where('customerid','=',$Id)->update($arr);
    }
    
    public function checkDuplicateMailExists($email)
    {
	return $this->where('email','=',$email)->get()->toArray();
    }
}
