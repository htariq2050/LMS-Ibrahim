<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $quizzes = Quiz::with('questions.answers')->get();
            return view('admin.instructor.quizzes.index', compact('quizzes'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to load quizzes: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // Get the currently logged-in instructor
            $instructor = auth()->user();
    
            // Fetch courses associated with the logged-in instructor
            $courses = Course::where('instructor_id', $instructor->id)->get();
    
            return view('admin.instructor.quizzes.create', compact('courses'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to load courses: ' . $e->getMessage());
        }
    }

 
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'course_id' => 'required|exists:courses,id',
    //         'questions.*.question_text' => 'required|string',
    //         'questions.*.answers.*.answer_text' => 'required|string',
    //     ]);

    //     DB::beginTransaction();
    //     try {
    //         $quiz = Quiz::create([
    //             'course_id' => $request->course_id,
    //             'title' => $request->title,
    //             'status' => 'active',
    //             'created_by' => auth()->id(),
    //         ]);

    //         foreach ($request->questions as $questionData) {
    //             $question = $quiz->questions()->create([
    //                 'question_text' => $questionData['question_text'],
    //                 'order' => $questionData['order'] ?? 0,
    //                 'status' => 'active',
    //                 'created_by' => auth()->id(),
    //             ]);

    //             foreach ($questionData['answers'] as $answerData) {
    //                 $question->answers()->create([
    //                     'answer_text' => $answerData['answer_text'],
    //                     'is_correct' => $answerData['is_correct'],
    //                     'status' => 'active',
    //                     'created_by' => auth()->id(),
    //                 ]);
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('admin.instructor.quizzes.index')->with('success', 'Quiz created successfully.');
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //         DB::rollBack();
    //         return back()->with('error', 'Failed to create quiz: ' . $e->getMessage());
    //     }
    // }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.answer_text' => 'required|string',
            'questions.*.correct_answer' => 'required|integer',
        ]);
    
        // Create the quiz
        $quiz = Quiz::create([
            'title' => $request->input('title'),
            'course_id' => $request->input('course_id'),
        ]);
    
        // Process questions and answers
        foreach ($request->input('questions') as $question) {
            $questionData = [
                'question_text' => $question['question_text'],
                'quiz_id' => $quiz->id,
            ];
    
            // Loop through answers and add the correct answer flag
            $answers = [];
            foreach ($question['answers'] as $key => $answer) {
                $answers[] = [
                    'answer_text' => $answer['answer_text'],
                    'is_correct' => $key == $question['correct_answer'] ? true : false,
                ];
            }
    
            // Save answers for each question
            $quiz->questions()->create($questionData)->answers()->createMany($answers);
        }
    
        return redirect()->route('instructor.quizzes.index')->with('success', 'Quiz created successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        try {
            $quiz->load('questions.answers');
            return view('admin.instructor.quizzes.edit', compact('quiz'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to load quiz for editing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions.*.question_text' => 'required|string',
            'questions.*.answers.*.answer_text' => 'required|string',
            'questions.*.answers.*.is_correct' => 'required|boolean',
        ]);

        DB::beginTransaction();
        try {
            // Update quiz
            $quiz->update([
                'title' => $request->title,
                'updated_by' => auth()->id(),
            ]);

            // Update or create questions and answers
            foreach ($request->questions as $questionId => $questionData) {
                $question = Question::updateOrCreate(
                    ['id' => $questionId, 'quiz_id' => $quiz->id],
                    [
                        'question_text' => $questionData['question_text'],
                        'order' => $questionData['order'] ?? 0,
                        'status' => 'active',
                        'updated_by' => auth()->id(),
                    ]
                );

                foreach ($questionData['answers'] as $answerId => $answerData) {
                    Answer::updateOrCreate(
                        ['id' => $answerId, 'question_id' => $question->id],
                        [
                            'answer_text' => $answerData['answer_text'],
                            'is_correct' => $answerData['is_correct'],
                            'status' => 'active',
                            'updated_by' => auth()->id(),
                        ]
                    );
                }
            }

            DB::commit();
            return redirect()->route('instructor.quizzes.index')->with('success', 'Quiz updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update quiz: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        try {
            $quiz->delete();
            return redirect()->route('instructor.quizzes.index')->with('success', 'Quiz deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete quiz: ' . $e->getMessage());
        }
    }
}
