@extends('admin.layouts.app')

@section('title')
Instructor
@endsection

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page ml-3">

    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    
    <!-- Lessons Section -->
    <h2>Lessons</h2>
    @foreach ($course->lessons as $lesson)
        <div class="lesson mb-4">
            <div class="row">
                @foreach ($lesson->videos as $video)
                    <div class="col-md-4 mb-4">
                        <div class="card video-card">
                            <div class="card-body">
                                <h3>{{ $lesson->title }}</h3>
                                <!-- Embed video with fullscreen enabled and without unnecessary options -->
                                <iframe class="video-iframe" 
                                src="https://www.youtube-nocookie.com/embed/{{ $video->video_url }}?rel=0&modestbranding=1&showinfo=0" 
                                frameborder="0" 
                                allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

</div>

@endsection
