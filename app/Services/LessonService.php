<?php

namespace App\Services;

use App\Models\Lesson;

class LessonService
{
    /**
     * Get all lessons for a specific course.
     */
    public function getLessonsByCourse($courseId)
    {
        return Lesson::where('course_id', $courseId)
            ->orderBy('order', 'asc')
            ->get();
    }

    /**
     * Get a specific lesson by ID.
     */
    public function getLessonById($id)
    {
        return Lesson::findOrFail($id);
    }

    /**
     * Create a new lesson.
     */
    public function createLesson(array $data)
    {
        return Lesson::create($data);
    }

    /**
     * Update an existing lesson.
     */
    public function updateLesson($id, array $data)
    {
        $lesson = $this->getLessonById($id);
        $lesson->update($data);
        return $lesson;
    }

    /**
     * Delete a lesson.
     */
    public function deleteLesson($id)
    {
        $lesson = $this->getLessonById($id);
        $lesson->delete();
    }
}