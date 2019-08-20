<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = "customergoal";
  protected $fillable =
[
    'goal_name',
    'cost_goal',
    'time_frame',
    'future_cost',
    'goal_id',
];
  
	public function InsertCustomerGoals($arr) {
	    
	    return $this->insertGetId($arr);
	}
    public function getGoalsList($id)
    {
	return $this->where('customerid','=',$id)->get()->toArray();
    }
}
