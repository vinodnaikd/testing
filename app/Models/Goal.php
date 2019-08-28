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
    'customergoalid',
];
  
	public function InsertCustomerGoals($arr) {
	    
	    return $this->insertGetId($arr);
	}
    public function getGoalsList($id)
    {
	return $this->where('customerid','=',$id)->get()->toArray();
    }
    public function getGoalsPriorityLastRecord($id)
    {
    return $this->select('goalpriority')->where('customerid','=',$id)->orderby('goalpriority', 'desc')->take(1)->get();
    }
    public function getGoals($id)
    {
    return $this->where('customergoalid','=',$id)->get()->toArray();
    }
}
