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
    
        // Get or create the active lesson
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
    
        $lesson = $activeLesson ? $activeLesson->lesson : null;
        $videos = $lesson ? $lesson->videos->sortBy('order') : [];
    
        // Get current video index
        $currentVideoIndex = $videos->search(function ($video) use ($lesson) {
            return $video->id == $lesson->videos()->first()->id;
        });
    
        // Get the next video URL
        $nextVideoUrl = null;
        if ($currentVideoIndex !== false && $currentVideoIndex < $videos->count() - 1) {
            $nextVideo = $videos[$currentVideoIndex + 1]; // Get next video
            $nextVideoUrl = route('student.video', $nextVideo->id); // Generate URL for next video
        }
    
        // If there's no next video, set URL to NULL (course completed)
        $nextVideoUrl = $nextVideoUrl ? $nextVideoUrl : null;
    
        // Calculate course completion percentage
        $totalLessons = $purchasedCourse->course->lessons->count();
        $completedLessons = CompleteVideo::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->count();
        $completionPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 2) : 0;
    
        return view('admin.student.lessons', [
            'purchasedCourse' => $purchasedCourse,
            'relatedCourses' => $relatedCourses,
            'currentLesson' => $lesson,
            'completionPercentage' => $completionPercentage,
            'nextVideoUrl' => $nextVideoUrl,  // Pass next video URL
        ]);
    }
    

public function viewVideo($videoId)
{
    $video = Video::find($videoId);
    
    $lesson = $video->lesson; 
    $course = $lesson->course;

    return view('admin.student.lessons', [
        'video' => $video,
        'lesson' => $lesson,
        'course' => $course,
    ]);
}

    public function markLessonComplete(Request $request)
{
    $lessonId = $request->input('lesson_id');
    $courseId = $request->input('course_id');

    // Mark the lesson as complete
    CompleteVideo::updateOrCreate(
        ['user_id' => Auth::id(), 'lesson_id' => $lessonId, 'course_id' => $courseId],
        ['completed_at' => now()]
    );
    

    // Get the next video
    $lesson = Lesson::find($lessonId);
    
    if (!$lesson) {
        return redirect()->route('student.dashboard')->with('error', 'Lesson not found.');
    }

    // Get the next video within the same lesson
    $nextVideo = Video::where('lesson_id', $lessonId)
        ->orderBy('order', 'asc')
        ->first();

    // If there's no next video, check the next lesson
    if (!$nextVideo) {
        $nextLesson = Lesson::where('course_id', $courseId)
            ->where('id', '>', $lessonId)
            ->orderBy('id', 'asc')
            ->first();

        if ($nextLesson) {
            $nextVideo = Video::where('lesson_id', $nextLesson->id)
                ->orderBy('order', 'asc')
                ->first();
        }
    }

    // Redirect to the next video or back if course completed
    if ($nextVideo) {
        return redirect()->route('student.video', $nextVideo->id);  // Redirect to next video
    }

    return redirect()->route('student.dashboard')->with('message', 'Course completed!');
}


    public function setActiveLesson(Request $request, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);

        // Update the active lesson for the user
        ActiveLesson::updateOrCreate(
            ['user_id' => Auth::id()],
            ['lesson_id' => $lessonId]
        );

        return response()->json([
            'success' => true,
            'lesson_title' => $lesson->title,
            'lesson_description' => $lesson->description,
            'video_url' => $lesson->videos->isNotEmpty() ? $lesson->videos[0]->video_url : null,
        ]);
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
