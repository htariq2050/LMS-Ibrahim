{{
    die($quiz[0]->course)
}}

@extends('admin.layouts.app')

@section('title', 'Student Quiz')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0">{{ $quiz[0]->title }}</h1>
                <div class="d-inline-flex align-items-center">
                    <i class="material-icons icon-16pt mr-1 text-muted">school</i>
                    <a href="#" class="text-muted">{{ $quiz[0]->course->title }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="alert alert-soft-blue d-flex align-items-center card-margin p-2" role="alert">
            <i class="material-icons mr-3">info</i>
            <div class="text-body">
                You have currently answered <strong class="text-primary">{{ $correctAnswers }} correct</strong> questions.
            </div>
        </div>

        <div class="row">
            <!-- Question Section -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <h4 class="m-0 text-primary mr-2"><strong>#{{ $currentQuestion->id }}</strong></h4>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title m-0">{{ $currentQuestion->text }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quiz-attempts.store', $quiz[0]->id) }}" method="POST">
                            @csrf
                            @foreach($currentQuestion->answers as $answer)
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="answer{{ $answer->id }}" name="selected_answer" value="{{ $answer->id }}" class="custom-control-input">
                                    <label for="answer{{ $answer->id }}" class="custom-control-label">{{ $answer->text }}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="card-footer">
                                <a href="#" class="btn btn-light">Skip</a>
                                <button type="submit" class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">arrow_forward</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Question Navigation -->
            <div class="col-md-4">
                <div class="list-group">
                    @foreach($questions as $question)
                    <a href="{{ route('quiz-attempts.show', ['quiz' => $quiz[0]->id, 'question' => $question->id]) }}" class="list-group-item {{ $currentQuestion->id == $question->id ? 'active' : '' }}">
                        <span class="media align-items-center">
                            <span class="media-left mr-2">
                                <span class="btn btn-light btn-sm">#{{ $question->id }}</span>
                            </span>
                            <span class="media-body">{{ $question->text }}</span>
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
