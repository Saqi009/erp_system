@extends('superadminlayout.main')

@section('title', 'Profile')

<head>
    <style>
        .video-gallery {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .video-item {
            border: 1px solid #ccc;
            padding: 10px;
            width: 320px;
            text-align: center;
        }
    </style>
</head>

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Videos</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.gallery') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @include('partials.alert')
    @if (count($videos) > 0)
        <div class="video-gallery">
            @foreach ($videos as $video)
                <div>
                    <button onclick="playFullscreen('video_{{ $video->id }}')">
                        <video id="video_{{ $video->id }}" width="250" height="220">
                            <source src="{{ asset('template/videos/' . $video->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </button>
                    <form action="{{ route('superadmin.gallery.video.destroy', $video) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="form-control btn btn-danger" style="float: left;" value="Delete">
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No video found!</div>
    @endif

    <script>
        // Function to play video in fullscreen mode
        function playFullscreen(videoId) {
            var video = document.getElementById(videoId);
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.webkitRequestFullscreen) { // Safari compatibility
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) { // IE11 compatibility
                video.msRequestFullscreen();
            }
            video.play();
        }

        // Function to pause video
        function pauseVideo(videoId) {
            var video = document.getElementById(videoId);
            video.pause();
        }
    </script>

@endsection
