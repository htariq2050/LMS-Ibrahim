<?php

namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Models\Video;
use App\Services\LessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class LessonController extends Controller
{
    protected $lessonService;


    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
        
    }

    public function index()
    {
        $courses = $this->lessonService->getLessonsByCourse();
        return view('admin.instructor.lessons.create', compact('courses'));
    }

    public function create()
    {
        $courses = $this->lessonService->getLessonsByCourse();
        return view('admin.instructor.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        // Validate lesson and video fields
        $validator = Validator::make($request->all(), [
            'course_id'   => 'required|exists:courses,id',
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'order'        => 'required|integer',
            'video_title'  => 'required|string|max:255',
            // 'video_url'    => 'required|url',
            'thumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration'     => 'required|integer',
            'video_order'  => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        DB::beginTransaction();
    
        try {
            // Store lesson
            $lesson = Lesson::create([
                'course_id'    => $request->course_id,
                'title'        => $request->title,
                'description'  => $request->description,
                'order'        => $request->order,
                'status'       => $request->status,
                'created_by'   => auth()->id(),
                'updated_by'   => auth()->id(),
            ]);
    
            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('public/thumbnails');
            }
    
            $video = Video::create([
                'lesson_id'    => $lesson->id,
                'title'        => $request->video_title,
                'video_url'    => $request->video_url,
                'thumbnail'    => $thumbnailPath,
                'order'        => $request->video_order,
                'duration'     => $request->duration,
                'status'       => $request->status,
                'created_by'   => auth()->id(),
                'updated_by'   => auth()->id(),
            ]);
    
            DB::commit();
    
            return redirect()->route('instructor.lessons.index')->with('success', 'Lesson and video saved successfully.');
    
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'There was an error saving the lesson and video. Please try again.'. $e->getMessage());
        }
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
