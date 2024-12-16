{{-- {{
    die($courses[0]->course->lessons)
}} --}}

@extends('admin.layouts.app')

@section('title', $courses[0]->course->title)

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0">{{ $courses[0]->course->title }}</h1>
                <div class="d-inline-flex align-items-center">
                    <i class="material-icons icon-16pt mr-1 text-muted">access_time</i> 
                    {{ $courses[0]->course->duration_hours }} 
                    <small class="text-muted ml-1 mr-1">hours</small>: 
                    {{ $courses[0]->course->duration_minutes }} 
                    <small class="text-muted ml-1">min</small>
                </div>
            </div>
            <div>
                <a href="#" class="btn btn-success">
                    Purchase:
                    <strong>${{ $courses[0]->course->price }}</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="row">
            <!-- Course Video and Description -->
            <div class="col-md-8">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="video-iframe" 
                        src="https://www.youtube-nocookie.com/embed/{{ $courses[0]->course->lessons[0]->videos[0]->video_url }}?rel=0&modestbranding=1&showinfo=0" 
                        frameborder="0" 
                        allowfullscreen></iframe>
                        {{-- <iframe class="embed-responsive-item" src="{{ $courses[0]->course->lessons[0]->videos[0]->video_url }}" allowfullscreen></iframe> --}}
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="{{ $courses[0]->course->instructor->profile_image }}" alt="About {{ $courses[0]->course->instructor->name }}" width="40" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">
                                    <a href="{{ route('student.profile', $courses[0]->course->instructor->id) }}" class="text-body">
                                        <strong>{{ $courses[0]->course->instructor->name }}</strong>
                                    </a>
                                </div>
                                <p class="text-muted mb-0">Instructor</p>
                            </div>
                            <div class="media-right">
                                <a href="{{ $courses[0]->course->instructor->facebook }}" class="btn btn-facebook btn-sm"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $courses[0]->course->instructor->twitter }}" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $courses[0]->course->instructor->github }}" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $courses[0]->course->instructor->bio }}
                    </div>
                </div>

                <!-- Course Description -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Description</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $courses[0]->course->description !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar for Lessons and Related Courses -->
            <div class="col-md-4">

                <!-- Lessons -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Lessons</h4>
                        </div>
                    </div>

                    <ul class="list-group list-group-fit">
                        @foreach($courses[0]->course->lessons as $index => $lesson)
                        <li class="list-group-item {{ $lesson->is_active ? 'active' : '' }}">
                            <div class="media">
                                <div class="media-left">
                                    <div class="{{ $lesson->is_active ? '' : 'text-muted' }}">{{ $index + 1 }}.{{$lesson->title}}</div>
                                </div>
                                <div class="media-body">
                                    {{-- <a href="{{ route('lesson.view', $lesson->id) }}" class="{{ $lesson->is_active ? 'text-white' : '' }}">{{ $lesson->title }}</a> --}}
                                    @if($lesson->is_free)
                                    <small class="badge badge-soft-success">FREE</small>
                                    @endif
                                    @if($lesson->is_pro)
                                    <small class="badge badge-soft-warning">PRO</small>
                                    @endif
                                </div>
                                <div class="media-right">
                                    <small class="{{ $lesson->is_active ? '' : 'text-muted' }}">{{ $lesson->duration }}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Related Courses -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Related Courses</h4>
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        @foreach($relatedCourses as $related)
                        <div class="card card__course clear-shadow border">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('course.view', $related->id) }}">
                                    <img src="{{ $related->cover_image }}" style="width:100%" alt="{{ $related->title }}">
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="text-body mb-1" href="{{ route('course.view', $related->id) }}">
                                            <strong>{{ $related->title }}</strong>
                                        </a><br>
                                        <div class="d-flex align-items-center">
                                            <span class="text-blue mr-1">
                                                ${{ $related->price }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
