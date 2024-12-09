<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends BaseModel
{
    protected $fillable = [
        'course_id',
        'title',
    ];

    /**
     * Get the course associated with the quiz.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the questions for the quiz.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
