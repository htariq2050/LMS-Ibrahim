<?php

namespace App\Models;


class Lesson extends BaseModel
{

    protected $fillable = [
        'course_id', 'title', 'description', 'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}
