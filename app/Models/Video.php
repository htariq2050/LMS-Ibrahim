<?php

namespace App\Models;


class Video extends BaseModel
{
    protected $fillable = [
        'lesson_id', 'title', 'video_url', 'thumbnail', 'order', 'duration',
    ];

    // Define the relationship with the Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
