@extends('admin.layouts.app')

@section('title')
    Create Quiz - Instructor
@endsection

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__container">
        <h1 class="mb-4">Create Quiz</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Quiz Form -->
        <form action="{{ route('instructor.quizzes.store') }}" method="POST">
            @csrf
            <!-- Quiz Title -->
            <div class="form-group mb-3">
                <label class="control-label h6">Quiz Title:</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Course Selection -->
            <div class="form-group mb-3">
                <label class="control-label h6">Select Course:</label>
                <select name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
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
            <div id="questions_wrapper">
                <div class="card mb-4 question-group" data-question-id="0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="question_handle btn btn-sm btn-secondary">
                                <i class="material-icons">menu</i>
                            </span>
                            <div class="h4 m-0 ml-4 d-flex align-items-center">Q: <input type="text" placeholder="Enter Question" name="questions[0][question_text]" class="form-control border-0" required></div>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm remove-question">Delete</button>
                    </div>

                    <div class="card-body">
                        <div class="mb-4" id="answerWrapper_0">
                            <ul class="list-group" id="answer_container_0">
                                @for ($i = 0; $i < 4; $i++)
                                    <li class="list-group-item d-flex align-items-center" data-answer-id="{{ $i }}">
                                        <div class="mr-2"><i class="material-icons text-light-gray">menu</i></div>
                                        <input type="text" name="questions[0][answers][{{ $i }}][answer_text]" class="form-control border-0 bg-light" placeholder="Answer {{ $i + 1 }}" required>
                                        <div class="ml-auto">
                                            <input type="radio" name="questions[0][correct_answer]" value="{{ $i }}" required>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Add Question Button -->
            <button type="button" id="add-question" class="btn btn-secondary mb-3">Add Question</button>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary"><i class="material-icons">add</i> Create Quiz</button>
        </form>
    </div>
</div>

<script>
    let questionIndex = 1;

    // Add new question
    document.getElementById('add-question').addEventListener('click', function() {
        const questionTemplate = `
            <div class="card mb-4 question-group" data-question-id="${questionIndex}">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <span class="question_handle btn btn-sm btn-secondary">
                            <i class="material-icons">menu</i>
                        </span>
                        <div class="h4 m-0 ml-4">Q: <input type="text" name="questions[${questionIndex}][question_text]" class="form-control border-0" required></div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-question">Delete</button>
                </div>
                <div class="card-body">
                    <div class="mb-4" id="answerWrapper_${questionIndex}">
                        <ul class="list-group" id="answer_container_${questionIndex}">
                            ${[...Array(4)].map((_, i) => `
                                <li class="list-group-item d-flex" data-answer-id="${i}">
                                    <div class="mr-2"><i class="material-icons text-light-gray">menu</i></div>
                                    <input type="text" name="questions[${questionIndex}][answers][${i}][answer_text]" class="form-control border-0" placeholder="Answer ${i + 1}" required>
                                    <div class="ml-auto">
                                        <input type="radio" name="questions[${questionIndex}][correct_answer]" value="${i}" required>
                                    </div>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('questions_wrapper').insertAdjacentHTML('beforeend', questionTemplate);
        questionIndex++;
    });

    // Remove question
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-question')) {
            e.target.closest('.question-group').remove();
        }
    });
</script>
@endsection
