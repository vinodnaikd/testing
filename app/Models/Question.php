<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";
  protected $fillable =
[
    'questiontext',
    'questionorder',
];
  
public function InsertQuestions($arr) {
    
    return $this->insertGetId($arr);
}
public function getQuestions() {
    
    return $this->get()->toArray();
}

}
