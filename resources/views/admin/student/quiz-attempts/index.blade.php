@extends('admin.layouts.app')

@section('title', 'Card')

@section('dashboardcontent')


<div class="container mt-5">
    <div class="row "> <!-- Center align row -->
        @foreach ($courses as $course)
            @if ($course->quizzes->count() > 0)
                <div class="col-lg-4 mb-4 offset-lg-1"> <!-- Added offset-lg-1 -->
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-body text-center">
                            <p>Course</p>
                            <h5 class="card-title font-weight-bold">{{ $course->title }}</h5>
                            <hr>
                            <a href="{{ route('admin.student.quiz-attempts.card', $course->id) }}" class="btn btn-primary">
                                View Quizzes
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


@endsection