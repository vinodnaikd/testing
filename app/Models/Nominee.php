<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $table = "customernominee";
    protected $fillable =
    [
        'name',
        'guardianname',
        'relation',
        'dateofbirth',
        'addressline1',
        'addressline2',
        'city',
        'country',
        'state',
        'pincode',
        'customerid'
        
    ];
    public $timestamps = false;
    public function InsertCustomerNomineeDetails($arr)
    {
       return $this->insertGetId($arr);
        
    }
    public function getCustomerNomineeDetailsByUserId($Id)
    {
        return $this->select('customerid')->where('userid','=',$Id)->get()->toArray();
    }
    public function getCustomerNomineeDetails($Id)
    {
        return $this->where('customerid','=',$Id)->get()->toArray();
    }
    
     public function getCustomerNomineeDetailsById($Id)
    {
        return $this->where('customernomineeid','=',$Id)->get()->toArray();
    }
    
    public function UpdateCustomerNomineeDetails($arr,$Id)
    {
        return $this->where('customernomineeid','=',$Id)->update($arr);
    }

}
