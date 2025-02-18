@extends('admin.layouts.app')

@section('title')
Instructor
@endsection

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page ml-3">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0">{{ $course->title }}</h1>
            </div>
            <div>
                <div class="btn" style="background:#4a1a8c; color:#fff;">
                    <strong>(Instructor ID: {{ $course->instructor_id }})</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Lessons Section -->
    <h2>Lessons</h2>
    <div class="container-fluid page__container">
        <div class="row">
            <!-- Course Video and Description -->
            <div class="col-md-8">
                <!-- Video Player -->
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="video-player" class="embed-responsive-item"
                            src="{{ $lesson && optional($lesson->videos->first())->video_url ? 'https://www.youtube-nocookie.com/embed/' . $lesson->videos->first()->video_url . '?rel=0&modestbranding=1&showinfo=0' : '' }}"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Lesson Content -->
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Lesson Details</h4>
                    </div>
                    <div class="card-body" id="lesson-content">
                        <h5>{{ $lesson->title ?? 'No Title Available' }}</h5>
                        <p>{{ $lesson->description ?? 'No Description Available' }}</p>
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                @if ($course->instructor && $course->instructor->profile)
                                    <img src="{{ $course->instructor->profile }}"
                                        alt="About {{ $course->instructor->name }}" width="50"
                                        class="rounded-circle">
                                @else
                                    <img src="/assets/images/avatar/profile-sample.avif"
                                        alt="About {{ $course->instructor->name }}" width="50"
                                        class="rounded-circle">
                                @endif
                            </div>
                            <div class="media-body">
                                <strong>{{ $course->instructor->first_name }}</strong>
                                <p class="text-muted mb-0">Instructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $course->instructor->bio }}
                    </div>
                </div>

                <!-- Course Description -->
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Course Description</h4>
                    </div>
                    <div class="card-body">
                        {!! $course->description !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar for Lessons -->
            <div class="col-md-4">
                <!-- Lessons List -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Lessons</h4>
                        </div>
                    </div>

                    <style>
                        .lesson-item.active {
                            background-color: #4a1a8c !important;
                            color: #fff !important;
                        }
                        .lesson-item.active .text-muted, .lesson-item.active .text-dark {
                            color: #fff !important;
                        }
                    </style>

                    <ul class="list-group list-group-fit" id="lesson-list">
                        @foreach ($course->lessons->sortBy('order') as $index => $lesson)
                            <li class="list-group-item lesson-item"
                                data-lesson-id="{{ $lesson->id }}"
                                data-video-url="{{ optional($lesson->videos->first())->video_url }}"
                                data-title="{{ $lesson->title }}"
                                data-description="{{ $lesson->description }}">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="text-muted">{{ $lesson->order }}.</div>
                                    </div>
                                    <div class="media-body">
                                        <a href="javascript:void(0);" class="lesson-link text-dark">
                                            {{ $lesson->title }}
                                        </a>
                                    </div>
                                    <div class="media-right">
                                        <small class="text-muted">
                                            {{ optional($lesson->videos->first())->duration ? gmdate('H:i:s', optional($lesson->videos->first())->duration) : 'N/A' }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div> <!-- End Sidebar -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.lesson-item').on('click', function() {
        // Get data from clicked lesson
        let videoUrl = $(this).data('video-url');
        let lessonTitle = $(this).data('title');
        let lessonDescription = $(this).data('description');

        // Remove 'active' class from all lessons and add to clicked one
        $('.lesson-item').removeClass('active');
        $(this).addClass('active');

        // Update video player
        if (videoUrl) {
            $('#video-player').attr('src', `https://www.youtube-nocookie.com/embed/${videoUrl}?rel=0&modestbranding=1&showinfo=0`);
        } else {
            $('#video-player').attr('src', '');
            alert('No video available for this lesson.');
        }

        // Update lesson details
        $('#lesson-content').html(`
            <h5>${lessonTitle}</h5>
            <p>${lessonDescription}</p>
        `);
    });
});
</script>

@endsection
