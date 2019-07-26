<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskQuestions extends Model
{
  protected $fillable =
    [
        'question_name',
        'option _a',
        'option_b',
        'option_c',
        'option_d',
        'question_id',
        'answer_if',
    ];
}
