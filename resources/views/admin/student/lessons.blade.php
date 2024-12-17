{{-- {{
    die($currentLesson->videos[0]->video_url)
}} --}}

@extends('admin.layouts.app')

@section('title', $purchasedCourse->course->title)

@section('dashboardcontent')
    <div class="mdk-drawer-layout__content page">
        <!-- Course Header -->
        <div class="container-fluid page__heading-container">
            <div
                class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                <div>
                    <h1 class="m-lg-0">{{ $purchasedCourse->course->title }}</h1>
                    <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-16pt mr-1 text-muted">access_time</i>
                        {{ $purchasedCourse->course->duration_hours }}
                        <small class="text-muted ml-1 mr-1">hours</small>:
                        {{ $purchasedCourse->course->duration_minutes }}
                        <small class="text-muted ml-1">min</small>
                    </div>
                </div>
                <div>
                    <a href="#" class="btn btn-success">
                        Purchase:
                        <strong>${{ $purchasedCourse->course->price }}</strong>
                    </a>
                </div>
            </div>
        </div>

        <!-- Page Container -->
        <div class="container-fluid page__container">
            <div class="row">
                <!-- Course Video and Description -->
                <div class="col-md-8">
                    <!-- Video Player -->
                    <div class="card">
                        <div class="embed-responsive embed-responsive-16by9">
                            @if ($currentLesson && $currentLesson->videos)
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube-nocookie.com/embed/{{ $currentLesson->videos[0]->video_url }}?rel=0&modestbranding=1&showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            @else
                                <div class="text-center p-5">No video available for this lesson.</div>
                            @endif
                        </div>
                    </div>

                    <!-- Instructor Info -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <img src="{{ $purchasedCourse->course->instructor->profile_image }}"
                                        alt="About {{ $purchasedCourse->course->instructor->name }}" width="40"
                                        class="rounded-circle">
                                </div>
                                <div class="media-body">
                                    <strong>{{ $purchasedCourse->course->instructor->name }}</strong>
                                    <p class="text-muted mb-0">Instructor</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $purchasedCourse->course->instructor->bio }}
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div class="card mt-3">
                        <div class="card-header bg-light">
                            <h4 class="card-title">Course Description</h4>
                        </div>
                        <div class="card-body">
                            {!! $purchasedCourse->course->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="card-title">Lessons</h4>
                        </div>
                        <ul class="list-group list-group-fit" id="lesson-list">
                            @foreach ($purchasedCourse->course->lessons as $lesson)
                                <li class="list-group-item lesson-item {{ $currentLesson && $currentLesson->id == $lesson->id ? 'active' : '' }}"
                                    data-lesson-id="{{ $lesson->id }}">
                                    <div class="media">
                                        <div class="media-body">
                                            <a href="javascript:void(0);"
                                                class="lesson-link {{ $currentLesson && $currentLesson->id == $lesson->id ? 'text-white' : 'text-dark' }}">
                                                {{ $lesson->title }}
                                            </a>
                                            @if ($lesson->is_free)
                                                <small class="badge badge-success ml-2">FREE</small>
                                            @endif
                                        </div>
                                        <div class="media-right">
                                            <small
                                                class="{{ $currentLesson && $currentLesson->id == $lesson->id ? 'text-white' : 'text-muted' }}">
                                                {{ $lesson->duration }}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Section for displaying new active lesson content -->
                    <div id="lesson-content" class="mt-4">
                        @if ($currentLesson)
                            <h5>{{ $currentLesson->title }}</h5>
                            <!-- Add other lesson details here -->
                            <p>{{ $currentLesson->description }}</p>
                        @else
                            <p>Select a lesson to view details.</p>
                        @endif
                    </div>


                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="card-title">Related Courses</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($relatedCourses as $related)
                                <div class="card mb-2">
                                    <img src="{{ $related->cover_image }}" class="card-img-top"
                                        alt="{{ $related->title }}">
                                    <div class="card-body p-2">
                                        <h6 class="mb-0">{{ $related->title }}</h6>
                                        <span class="text-success">${{ $related->price }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- End Sidebar -->
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.lesson-item').on('click', function() {
                const lessonId = $(this).data('lesson-id');
    
                // Make an AJAX call to update the active lesson
                $.ajax({
                    url: '{{ url('/student/lesson/set-active/') }}/' + lessonId, // Correct URL construction
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF Token for Laravel
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove 'active' class from all lessons and set it for the selected one
                            $('.lesson-item').removeClass('active');
                            $(`li[data-lesson-id="${lessonId}"]`).addClass('active');
    
                            // Update lesson content dynamically
                            $('#lesson-content').html(`
                                <h5>${response.lesson_title}</h5>
                                <p>${response.lesson_description}</p>
                            `);
                        } else {
                            alert('Something went wrong: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        // Proper error message display
                        alert('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });
    </script>
    
    


@endsection
