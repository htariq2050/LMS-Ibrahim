<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizAttemptController extends Controller
{
     
        public function index()
        {
            $studentId = Auth::id(); 
            
            $quizzes = Quiz::with('course')->where('status', 'active')->get();
            
            $correctAnswers = [];
     
            foreach ($quizzes as $quiz) {
                $correctCount = QuizAttempt::where('quiz_id', $quiz->id)
                    ->where('user_id', $studentId)
                    ->where('is_correct', true) 
                    ->count();
        
                $correctAnswers[$quiz->id] = $correctCount;
            }
        
            
            return view('admin.student.quiz-attempts.index', compact('quizzes', 'correctAnswers'));
        }
    
  
  
      public function show(Quiz $quiz)
      {
          $questions = $quiz->questions()->with('answers')->get();
          return view('admin.student.quiz-attempts.show', compact('quiz', 'questions'));
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
