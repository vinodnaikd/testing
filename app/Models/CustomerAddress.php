<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'customeraddress';
    protected $fillable =
        [
            'address1',
            'address2',
            'address3',
            'cityid_fk',
            'stateid_fk',
            'countryid_fk',
            'pincode',
            'customerid',
            'address_type'

        ];
    public function InsertCustomerAddress($arr)
    {
       return $this->insertGetId($arr);
        
    }
}

?>
