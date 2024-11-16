<?php

namespace App\Models;


class Lesson extends BaseModel
{
    protected $fillable = [
        'course_id', 'title', 'description', 'order',
    ];

    // Define the relationship with the Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Define the relationship with Videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
