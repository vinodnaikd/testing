<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customerfundposttran extends Model
{
    protected $table = 'customerfundposttran';
    public $timestamps = false;

    public function AddCustomerOrderPost($arr)
    {
       return $this->insertGetId($arr);
    }
}
