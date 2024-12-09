@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<h1>Edit Quiz</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('instructor.quizzes.update', $quiz->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Quiz Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $quiz->title) }}" required>
    </div>

    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" id="course_id" class="form-control" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $quiz->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="questions-wrapper">
        <h3>Questions</h3>
        @foreach($quiz->questions as $questionIndex => $question)
            <div class="question-group">
                <div class="form-group">
                    <label for="question_text">Question Text</label>
                    <input type="text" name="questions[{{ $questionIndex }}][question_text]" class="form-control" value="{{ old('questions.'.$questionIndex.'.question_text', $question->question_text) }}" required>
                </div>

                <div class="answers-group">
                    @foreach($question->answers as $answerIndex => $answer)
                        <div class="form-group">
                            <label for="answer_text">Answer</label>
                            <input type="text" name="questions[{{ $questionIndex }}][answers][{{ $answerIndex }}][answer_text]" class="form-control" value="{{ old('questions.'.$questionIndex.'.answers.'.$answerIndex.'.answer_text', $answer->answer_text) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="is_correct">Is Correct?</label>
                            <input type="checkbox" name="questions[{{ $questionIndex }}][answers][{{ $answerIndex }}][is_correct]" class="form-control" value="1" {{ $answer->is_correct ? 'checked' : '' }}>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Update Quiz</button>
</form>

<button id="add-question" class="btn btn-secondary">Add Question</button>

<script>
    let questionIndex = {{ count($quiz->questions) }};
    let answerIndex = 0;

    document.getElementById('add-question').addEventListener('click', function() {
        const questionWrapper = document.createElement('div');
        questionWrapper.classList.add('question-group');
        questionWrapper.innerHTML = `
            <div class="form-group">
                <label for="question_text">Question Text</label>
                <input type="text" name="questions[${questionIndex}][question_text]" class="form-control" required>
            </div>
            <div class="answers-group">
                <div class="form-group">
                    <label for="answer_text">Answer 1</label>
                    <input type="text" name="questions[${questionIndex}][answers][0][answer_text]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="is_correct">Is Correct?</label>
                    <input type="checkbox" name="questions[${questionIndex}][answers][0][is_correct]" class="form-control" value="1">
                </div>
            </div>
        `;
        document.getElementById('questions-wrapper').appendChild(questionWrapper);
        questionIndex++;
    });
</script>
@endsection