<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $guards = [];

    public function answer(){
        return $this->belongsTo(Answer::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
