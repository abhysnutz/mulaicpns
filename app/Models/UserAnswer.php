<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = ['user_exam_id','question_id','answer_id'];

    public function answer(){
        return $this->belongsTo(Answer::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
