<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable =
[
    'notification_title',
    'notificatio_message',
    'notification_status',
    'notification_time',
    'notification_id',
  ];
  
      public function InsertCustomerNotifications($arr)
    {
       return $this->insertGetId($arr);
        
    }
    
        public function getUserNotifications($userid)
    {
	return $this->where('userid','=',$userid)->get()->toArray();
    }
}
