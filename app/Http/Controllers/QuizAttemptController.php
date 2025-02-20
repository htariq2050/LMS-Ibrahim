<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller
{
     
    public function index()
    {
        $studentId = Auth::id(); 
    
        // Fetch courses with related quizzes
        $courses = Course::with('quizzes')->get();
    
        // Fetch active quizzes with related course information
        $quizzes = Quiz::with('course')
            ->where('status', 'active')
            ->get();
    
        $correctAnswers = [];
        foreach ($quizzes as $quiz) {
            $correctCount = QuizAttempt::where('quiz_id', $quiz->id)
                ->where('user_id', $studentId)
                ->count();
            
            $correctAnswers[$quiz->id] = $correctCount;
        }
    
        // Pass courses, quizzes, and correct answers count to the view
        return view('admin.student.quiz-attempts.index', compact('courses', 'quizzes', 'correctAnswers'));
    }
    
    
    public function takeQuiz($quizId)
{
    // Fetch the quiz and its questions
    $quiz = Quiz::with('questions.answers')->findOrFail($quizId);

    // Show the quiz attempt page
    return view('admin.student.quiz-attempts.index', compact('quiz'));
}

public function getQuizzes($courseId)
{
    // Fetch the selected course with related quizzes
    $course = Course::with('quizzes.questions.answers')->findOrFail($courseId);
    $quizzes = $course->quizzes;

    return response()->json([
        'quizzes' => $quizzes
    ]);
}



public function showCard()
{
    try {
        // Get the currently logged-in instructor or user
        $instructor = auth()->user();

        // Fetch quizzes associated with the instructor
        $quizzes = Quiz::where('instructor_id', $instructor->id)->with('questions')->get();

        return view('admin.instructor.quizzes.show', compact('quizzes'));
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to load quizzes: ' . $e->getMessage());
    }
}


  
public function show($quizId)
{
    // Find the quiz by its ID
    $quiz = Quiz::with('questions.answers')->findOrFail($quizId);

    // Optionally, fetch previous attempt data for the student if needed
    $studentId = Auth::id();
    $previousAttempt = QuizAttempt::where('quiz_id', $quizId)
                                   ->where('user_id', $studentId)
                                   ->first();

    return view('admin.student.quiz-attempts.show', compact('quiz', 'previousAttempt'));
}
 
      public function store(Request $request, Quiz $quiz)
      {
          $request->validate([
              'answers' => 'required|array', 
          ]);
  
          $attempt = QuizAttempt::create([
              'quiz_id' => $quiz->id,
              'student_id' => auth()->id(),
              'started_at' => now(),
              'completed_at' => now(),
              'score' => 0,
              'status' => 'completed',
          ]);
  
          $score = 0;
          foreach ($request->answers as $questionId => $answerId) {
              $answer = Answer::find($answerId);
  
              $isCorrect = $answer && $answer->is_correct;
              if ($isCorrect) {
                  $score++;
              }
  
              $attempt->answers()->create([
                  'question_id' => $questionId,
                  'answer_id' => $answerId,
                  'is_correct' => $isCorrect,
              ]);
          }
  
          $attempt->update(['score' => $score]);
  
          return redirect()->route('quiz-attempts.index')->with('success', 'Quiz completed! Your score: ' . $score);
      }
}
