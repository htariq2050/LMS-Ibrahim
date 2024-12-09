@extends('admin.layouts.app')

@section('title')
    Create Quiz - Instructor
@endsection

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

<div class="container mt-4">
    <h1 class="mb-4">Create Quiz</h1>

    <form action="{{ route('instructor.quizzes.store') }}" method="POST">
        @csrf
        <!-- General Validation Errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Quiz Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Quiz Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Selection -->
        <div class="mb-3">
            <label for="course_id" class="form-label">Select Course</label>
            <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
            @error('course_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Questions Section -->
        <div id="questions-wrapper">
            <h3 class="mb-3">Questions</h3>
            <div class="question-group mb-3" id="question-0">
                <div class="mb-3">
                    <label for="question_text" class="form-label">Question Text</label>
                    <input type="text" name="questions[0][question_text]" class="form-control @error('questions.0.question_text') is-invalid @enderror" required>
                    @error('questions.0.question_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Answer Fields -->
                <div class="answers-group">
                    @for($i = 0; $i < 4; $i++)
                        <div class="mb-3">
                            <label for="answer_text_{{ $i }}" class="form-label">Answer {{ $i+1 }}</label>
                            <input type="text" name="questions[0][answers][{{ $i }}][answer_text]" class="form-control @error('questions.0.answers.' . $i . '.answer_text') is-invalid @enderror" required>
                            @error('questions.0.answers.' . $i . '.answer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correct Answer Radio -->
                        <div class="mb-3 form-check">
                            <input type="radio" name="questions[0][correct_answer]" value="{{ $i }}" class="form-check-input @error('questions.0.correct_answer') is-invalid @enderror" required>
                            <label class="form-check-label" for="is_correct_{{ $i }}">Is Correct?</label>
                            @error('questions.0.correct_answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Add Question Button -->
        <button type="button" id="add-question" class="btn btn-secondary mb-3">Add Question</button>

        <button type="submit" class="btn btn-primary">Create Quiz</button>
    </form>

</div>
</div>

<script>
    let questionIndex = 1;

    document.getElementById('add-question').addEventListener('click', function() {
        const questionWrapper = document.createElement('div');
        questionWrapper.classList.add('question-group');
        questionWrapper.innerHTML = `
            <div class="mb-3">
                <label for="question_text_${questionIndex}" class="form-label">Question Text</label>
                <input type="text" name="questions[${questionIndex}][question_text]" class="form-control" required>
            </div>
            <div class="answers-group">
                <div class="mb-3">
                    <label for="answer_text_1_${questionIndex}" class="form-label">Answer 1</label>
                    <input type="text" name="questions[${questionIndex}][answers][0][answer_text]" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="radio" name="questions[${questionIndex}][correct_answer]" value="0" class="form-check-input" required>
                    <label class="form-check-label" for="is_correct_1_${questionIndex}">Is Correct?</label>
                </div>
                <div class="mb-3">
                    <label for="answer_text_2_${questionIndex}" class="form-label">Answer 2</label>
                    <input type="text" name="questions[${questionIndex}][answers][1][answer_text]" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="radio" name="questions[${questionIndex}][correct_answer]" value="1" class="form-check-input" required>
                    <label class="form-check-label" for="is_correct_2_${questionIndex}">Is Correct?</label>
                </div>
                <div class="mb-3">
                    <label for="answer_text_3_${questionIndex}" class="form-label">Answer 3</label>
                    <input type="text" name="questions[${questionIndex}][answers][2][answer_text]" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="radio" name="questions[${questionIndex}][correct_answer]" value="2" class="form-check-input" required>
                    <label class="form-check-label" for="is_correct_3_${questionIndex}">Is Correct?</label>
                </div>
                <div class="mb-3">
                    <label for="answer_text_4_${questionIndex}" class="form-label">Answer 4</label>
                    <input type="text" name="questions[${questionIndex}][answers][3][answer_text]" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="radio" name="questions[${questionIndex}][correct_answer]" value="3" class="form-check-input" required>
                    <label class="form-check-label" for="is_correct_4_${questionIndex}">Is Correct?</label>
                </div>
            </div>
        `;
        document.getElementById('questions-wrapper').appendChild(questionWrapper);
        questionIndex++;
    });
</script>
@endsection
