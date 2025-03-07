<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guards = [];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function users(){
        return $this->hasMany(UserAnswer::class);
    }
}
