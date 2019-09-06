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
    'goalpriority'
];
 public $timestamps = false;
	public function InsertCustomerGoals($arr) {
	    
	    return $this->insertGetId($arr);
	}
    public function getGoalsList($id)
    {
	return $this->where('customerid','=',$id)->orderby('goalpriority')->get()->toArray();
    }
    public function getGoalsPriorityLastRecord($id)
    {
    return $this->select('goalpriority')->where('customerid','=',$id)->orderby('goalpriority', 'desc')->take(1)->get();
    }
    public function getGoals($id)
    {
    return $this->where('customergoalid','=',$id)->get()->toArray();
    }
    public function getGoalsById($goalid,$customerid)
    {
    return $this->where('customergoalid','=',$goalid)->where('customerid','=',$customerid)->get()->first();
    }
    public function getGoalIdBasedOnPriority($id,$customerid)
    {
    return $this->where('goalpriority','=',$id)->where('customerid','=',$customerid)->get()->first();
    }
    public function UpdateCustomerGoals($Id,$arr)
    {
      return $this->where('customergoalid','=',$Id)->update($arr);
    }
}
