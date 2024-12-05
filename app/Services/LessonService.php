<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use FFMpeg\FFMpeg;

class LessonService
{
    /**
     * Get all lessons for a specific course.
     */
    public function getLessonsByCourse()
    {
        return Course::with('subcategory')->orderBy('id', 'asc')->get();
    }

 
    public function getLessonById($id)
    {
        return Lesson::findOrFail($id);
    }

  
    public function createLesson(array $data)
    {
        return Lesson::create($data);
    }

    // public function createLessonWithVideos(array $data)
    // {
    //     DB::beginTransaction(); 

    //     try {
            
    //         $lesson = Lesson::create([
    //             'course_id' => $data['course_id'],
    //             'title' => $data['title'],
    //             'description' => $data['description'],
    //             'order' => $data['order'],
    //             'status' => $data['status'],
    //             'created_by' => auth()->id(),
    //             'updated_by' => auth()->id(),
    //         ]);

            

    //         DB::commit(); 

    //         return $lesson;
    //     } catch (Exception $e) {
    //         DB::rollBack(); 
    //         return $e->getMessage();
    //         Log::error('Error creating lesson with videos: ', [
    //             'message' => $e->getMessage(),
    //             'stack' => $e->getTraceAsString(),
    //         ]);

    //         throw new \RuntimeException('An error occurred while creating the lesson. Please try again.');
    //     }
    // }
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