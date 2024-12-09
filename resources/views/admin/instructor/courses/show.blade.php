@extends('admin.layouts.app')

@section('title')
Instructor
@endsection

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">

    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    
    <!-- Lessons Section -->
    <h2>Lessons</h2>
    @foreach ($course->lessons as $lesson)
        <div class="lesson mb-4">
            <h3>{{ $lesson->title }}</h3>
            <div class="row">
                @foreach ($lesson->videos as $video)
                    <div class="col-md-4">
                        <div class="card">
                            <a href="#" class="video-thumbnail" data-toggle="modal" data-target="#videoModal" data-video-url="{{ $video->video_url }}">
                                <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="card-img-top">
                                <div class="play-icon">
                                    <i class="material-icons">play_arrow</i>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->title }}</h5>
                                <p class="card-text">
                                    Duration: {{ gmdate('H:i:s', $video->duration) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Play Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="videoIframe" width="100%" height="400px" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is loaded -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> <!-- Ensure Bootstrap is loaded -->

<script>
    $(document).ready(function () {
        // When a video thumbnail is clicked
        $('.video-thumbnail').on('click', function () {
            const videoUrl = $(this).data('video-url'); // Get the video URL from data attribute
            console.log("Video URL:", videoUrl); // Debugging step to see the video URL in the console

            // Check if it's a YouTube URL and convert to embed format
            let embedUrl;
            if (videoUrl.includes('youtube.com/watch?v=')) {
                // Convert standard YouTube URL to embed format
                const videoId = videoUrl.split('v=')[1].split('&')[0]; // Get video ID
                embedUrl = 'https://www.youtube.com/embed/' + videoId;
                console.log("Embed URL (full):", embedUrl); // Debugging step to ensure embed URL is correct
            } else if (videoUrl.includes('youtu.be/')) {
                // Handle the short URL format (youtu.be)
                const videoId = videoUrl.split('youtu.be/')[1]; // Extract the video ID from short URL
                embedUrl = 'https://www.youtube.com/embed/' + videoId;
                console.log("Embed URL (short URL):", embedUrl); // Debugging step
            } else {
                alert('Invalid video URL. Only YouTube URLs are supported.');
                return;
            }

            // Set the iframe source to the embed URL
            $('#videoIframe').attr('src', embedUrl);
        });

        // Clear the video when the modal is closed
        $('#videoModal').on('hidden.bs.modal', function () {
            $('#videoIframe').attr('src', ''); // Clear iframe src to stop the video
        });
    });
</script>
@endsection
