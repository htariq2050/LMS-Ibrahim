<?php

namespace App\Http\Controllers;

use App\Models\ActiveLesson;
use App\Models\Course;
use App\Models\CompleteVideo;
use App\Models\Video;
use App\Models\Lesson;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchases = Purchase::where('user_id', Auth::id())
            ->with(['user', 'course'])
            ->get();
    
        return view('admin.purchases.index', compact('purchases'));
    }

    public function purchasedCourses(Request $request)
    {
        $courses = Purchase::where('user_id', Auth::id()) 
            ->with('course')
            ->get();
    
        return view('admin.student.courses.index', ['courses' => $courses]);
    }
    
    public function studentCoursesAndLessons($courseId)
    {
        $purchasedCourse = Purchase::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->with(['course.lessons.videos'])
            ->first();

        if (!$purchasedCourse) {
            abort(404, 'Course not found or not purchased.');
        }

        $relatedCourses = Course::where('id', '!=', $courseId)->get();
        $activeLesson = ActiveLesson::where('user_id', Auth::id())->first();

        if (!$activeLesson) {
            $firstLesson = optional($purchasedCourse->course->lessons()->with('videos')->first());
            if ($firstLesson) {
                $activeLesson = ActiveLesson::updateOrCreate(
                    ['user_id' => Auth::id()],
                    ['lesson_id' => $firstLesson->id]
                );
                $activeLesson->load('lesson.videos');
            }
        } else {
            $activeLesson->load('lesson.videos');
        }

        $currentLesson = $activeLesson ? $activeLesson->lesson : null;
        $course = $purchasedCourse->course;
        $totalLessons = $course->lessons->count();
        $completedLessons = CompleteVideo::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->count();
        $completionPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 2) : 0;

        $video = ($currentLesson && $currentLesson->videos->isNotEmpty()) 
                 ? $currentLesson->videos->first() 
                 : null;

        return view('admin.student.lessons', [
            'purchasedCourse'      => $purchasedCourse,
            'relatedCourses'       => $relatedCourses,
            'currentLesson'        => $currentLesson,
            'course'               => $course,
            'video'                => $video,
            'completionPercentage' => $completionPercentage,
        ]);
    }

    public function viewVideo($videoId)
    {
        $video = Video::find($videoId);
        if (!$video) {
            abort(404, 'Video not found.');
        }
    
        $lesson = $video->lesson;
        if (!$lesson) {
            abort(404, 'Lesson not found for this video.');
        }
    
        $course = $lesson->course;
        if (!$course) {
            abort(404, 'Course not found for this lesson.');
        }
    
        // Ensure user purchased the course
        $purchasedCourse = Purchase::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();
    
        if (!$purchasedCourse) {
            abort(403, 'You do not have access to this course.');
        }
    
        // Debugging log
        \Log::info("Viewing Video: ", ['video_id' => $videoId, 'lesson_id' => $lesson->id, 'course_id' => $course->id]);
    
        // Get all videos for the lesson
        $videos = $lesson->videos()->orderBy('order', 'asc')->get();
        $currentVideoIndex = $videos->search(fn($v) => $v->id == $videoId);
    
        $nextVideoUrl = null;
        if ($currentVideoIndex !== false && $currentVideoIndex < $videos->count() - 1) {
            $nextVideo = $videos[$currentVideoIndex + 1];
            $nextVideoUrl = route('student.video', ['videoId' => $nextVideo->id]);
        } else {
            $nextLesson = Lesson::where('course_id', $course->id)
                ->where('id', '>', $lesson->id)
                ->orderBy('id', 'asc')
                ->first();
            if ($nextLesson) {
                $nextVideo = Video::where('lesson_id', $nextLesson->id)
                    ->orderBy('order', 'asc')
                    ->first();
                if ($nextVideo) {
                    $nextVideoUrl = route('student.video', ['videoId' => $nextVideo->id]);
                }
            }
        }
    
        return view('admin.student.lessons', [
            'purchasedCourse' => $purchasedCourse, // Add this line
            'video'           => $video,
            'lesson'          => $lesson,
            'course'          => $course,
            'nextVideoUrl'    => $nextVideoUrl,
        ]);
    }
    
        
    public function markLessonComplete(Request $request)
    {
        $lessonId = $request->input('lesson_id');
        $courseId = $request->input('course_id');
        $videoId = $request->input('video_id');

        if (!$videoId) {
            return response()->json(['error' => 'Video ID is required.'], 400);
        }

        CompleteVideo::updateOrCreate(
            [
                'user_id'   => Auth::id(), 
                'lesson_id' => $lessonId, 
                'course_id' => $courseId, 
                'video_id'  => $videoId
            ],
            ['completed_at' => now()]
        );

        return response()->json(['message' => 'Lesson marked as complete.']);
    }

    public function checkout(Course $course)
    {
        return view('admin.purchases.checkout', compact('course'));
    }


    public function create()
    {
        $courses = Course::all(); // Retrieve all courses for the dropdown or selection

        return view('admin.purchases.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'amount_paid' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,completed,failed',
        ]);
        
        // Check if the user already purchased the course
        $existingPurchase = Purchase::where('user_id', Auth::id())
        ->where('course_id', $request->course_id)
        ->first();

        if ($existingPurchase) {
            return redirect()->route('purchases.index')->with('error', 'You have already purchased this course.');
        }

        // Create a new purchase
        $purchase = Purchase::create([
            'purchase_id' => uniqid('PUR-'),
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
            'purchase_date' => now(),
            'amount_paid' => $request->amount_paid,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase successfully created.');
    }


    public function show($id)
    {
        $purchase = Purchase::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('admin.purchases.show', compact('purchase'));
    }

 
    public function edit($id)
    {
        $purchase = Purchase::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $courses = Course::all();

        return view('admin.purchases.edit', compact('purchase', 'courses'));
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'amount_paid' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,completed,failed',
        ]);

        $purchase = Purchase::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $purchase->update([
            'course_id' => $request->course_id,
            'amount_paid' => $request->amount_paid,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase successfully updated.');
    }

    
    public function destroy($id)
    {
        $purchase = Purchase::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $purchase->delete();

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase successfully deleted.');
    }
}
