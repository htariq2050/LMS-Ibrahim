<?php

namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Services\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $lessonService;


    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

  
    public function index($courseId)
    {
        $lessons = $this->lessonService->getLessonsByCourse($courseId);
        return view('admin.instructor.lessons.index', compact('lessons'));
    }


    public function create()
    {
        return view('admin.instructor.lessons.create');
    }

  
    public function store(LessonRequest $request)
    {
        $lesson = $this->lessonService->createLesson($request->validated());
        return redirect()->route('instructor.course.index')
            ->with('success', 'Lesson created successfully.');
    }

   
    public function edit($id)
    {
        $lesson = $this->lessonService->getLessonById($id);
        return view('admin.instructor.lessons.edit', compact('lesson'));
    }


    public function update(LessonRequest $request, $id)
    {
        $this->lessonService->updateLesson($id, $request->validated());
        return redirect()->route('instructor.course.index')
            ->with('success', 'Lesson updated successfully.');
    }


    public function destroy($id)
    {
        $this->lessonService->deleteLesson($id);
        return redirect()->back()->with('success', 'Lesson deleted successfully.');
    }
}
