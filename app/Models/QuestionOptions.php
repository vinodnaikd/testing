<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOptions extends Model
{
    protected $table = "questionoptions";
  protected $fillable =
[
    'optionname',
    'questionid',
    'score'
];
  
public function InsertQuestionsOptions($arr) {
    
    return $this->insertGetId($arr);
}
public function getQuestionsOptions($id) {
    
    return $this->where('questionid',$id)->get()->toArray();
}
}
