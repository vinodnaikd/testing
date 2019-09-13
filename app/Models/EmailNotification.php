<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
     protected $table = 'events_notify';
  protected $fillable =
    [
    	'userid',
        'type',
        'isemailopt',
        'issmsopt',
        'isnotificationopt',
    ];
   public $timestamps = false;
   public function InsertCustomerEmailSmsNot($arr) {
	    
	    return $this->insertGetId($arr);
	}
	public function getUserEvents($id)
    {
	return $this->where('userid','=',$id)->get()->first();
    }
}
