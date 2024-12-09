<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    protected $fillable = [
        'quiz_id',
        'question_text',
        'order',
    ];

 
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
