@extends('admin.layouts.app')

@section('title', $purchasedCourse->course->title)

@section('dashboardcontent')
    <div class="mdk-drawer-layout__content page">
        <!-- Course Header -->
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                <div>
                    <h1 class="m-lg-0">{{ $purchasedCourse->course->title }}</h1>
                    <!-- <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-16pt mr-1 text-muted">access_time</i>
                        {{ $purchasedCourse->course->duration_hours }}
                        <small class="text-muted ml-1 mr-1">hours</small>:
                        {{ $purchasedCourse->course->duration_minutes }}
                        <small class="text-muted ml-1">min</small>
                    </div> -->
                </div>
                <div>
                    <div class="btn" style="background:#4a1a8c; color:#fff;">
                        Purchased:
                        <strong>${{ $purchasedCourse->course->price }}</strong>
                    </div>
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
                            @if ($currentLesson && $currentLesson->videos->isNotEmpty())
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
                                    @if ($purchasedCourse->course->instructor->profile != null)
                                        <img src="{{ $purchasedCourse->course->instructor->profile }}"
                                            alt="About {{ $purchasedCourse->course->instructor->name }}" width="50"
                                            class="rounded-circle">
                                    @else
                                        <img src="/assets/images/avatar/profile-sample.avif"
                                            alt="About {{ $purchasedCourse->course->instructor->name }}" width="50"
                                            class="rounded-circle">                                    
                                    @endif
                                </div>
                                <div class="media-body">
                                    <strong>{{ $purchasedCourse->course->instructor->first_name }}</strong>
                                    <p class="text-muted mb-0">Student</p>
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

                <!-- Sidebar -->
                <div class="col-md-4">
                    <!-- Lessons List -->
                    <div class="card">
                        <div class="card-header card-header-large bg-light d-flex align-items-center">
                            <div class="flex">
                                <h4 class="card-header__title">Course Lessons</h4>
                            </div>
                        </div>
                        <style>
                            .lesson-item.active{
                                background-color: #4a1a8c !important;
                                color: #fff!important;
                            }
                            .lesson-item.active .text-muted, .lesson-item.active .text-dark{
                                color: #fff!important;
                            }
                        </style>
                        <ul class="list-group list-group-fit" id="lesson-list">
                            @foreach ($purchasedCourse->course->lessons->sortBy('order') as $index => $lesson)
                                <li class="list-group-item lesson-item {{ $currentLesson && $currentLesson->id == $lesson->id ? 'active' : '' }}"
                                    data-lesson-id="{{ $lesson->id }}">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted">{{ $lesson->order }}.</div> <!-- Use lesson order -->
                                        </div>
                                        <div class="media-body">
                                            <a href="javascript:void(0);" class="lesson-link text-dark">
                                                {{ $lesson->title }}
                                            </a>
                                            @if ($lesson->is_free)
                                                <small class="badge badge-success ml-2">FREE</small>
                                            @endif
                                        </div>
                                        <div class="media-right">
                                            <small class="text-muted">
                                                {{ gmdate('H:i:s', $lesson->videos[0]->duration) }}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Related Courses -->
                    <div class="card ">
                        <div class="card-header card-header-large bg-light d-flex align-items-center">
                            <div class="flex">
                                <h4 class="card-header__title">Related Courses</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($relatedCourses as $related)
                                <div class="card card__course clear-shadow border">
                                    <div class=" d-flex justify-content-center">
                                        <a class="" href="#">
                                            <img src="{{ '/uploads/courses_cover_images/' . $related->cover_image }}" style="width:100%" alt="{{ $related->title }}">
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center">
                                            
                                            <div>
                                                <a class="text-body mb-1" href="#"><strong>{{ $related->category->name }}</strong></a><br>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-blue mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                                <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <a href="take-course.html" class="small">{{ $related->title }}</a>
                                                </div>
                                            </div>
                                            <a href="{{ route('checkout', $related->id) }}" class="btn btn-primary ml-auto">${{ $related->price }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="card-title">Related Courses</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($relatedCourses as $related)
                                <div class="card mb-2">
                                    <img src="{{ '/uploads/courses_cover_images/' . $related->cover_image }}" class="card-img-top"
                                        alt="{{ $related->title }}">
                                    <div class="card-body p-2">
                                        <h6 class="mb-0">{{ $related->title }}</h6>
                                        <span class="text-success">${{ $related->price }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> -->
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
                    url: '{{ url('/student/lesson/set-active/') }}/' + lessonId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove 'active' class from all lessons and set it for the selected one
                            $('.lesson-item').removeClass('active');
                            $(`li[data-lesson-id="${lessonId}"]`).addClass('active');

                            // Update the video player
                            const videoUrl = response.video_url ? `https://www.youtube-nocookie.com/embed/${response.video_url}?rel=0&modestbranding=1&showinfo=0` : '';
                            $('.embed-responsive-item').attr('src', videoUrl);

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
                        alert('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });
    </script>
@endsection