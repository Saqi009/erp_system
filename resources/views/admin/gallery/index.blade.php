@extends('adminlayout.main')

@section('title', 'Profile')

<head>
    <style>
        #box .card-body {
            background-size: cover;
        }

        #box {
            border-radius: 10px;
        }

        #box:hover {
            box-shadow: 2px 2px 7px
        }
    </style>
</head>

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Gallery</h1>
            </div>
            <div class="col-md-6">
                {{-- <a href="{{ route('admin.profile.create') }}" style="float: right" class="btn btn-primary">Add</a> --}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4"><a href="{{ route('admin.gallery.videos') }}">Add videos</a></div>
            <div class="col-md-4"><a href="{{ route('admin.gallery.images') }}">Add images</a></div>
            <div class="col-md-4"><a href="{{ route('admin.gallery.files') }}">Add files</a></div>
        </div>

        <div class="row justify-content-round mt-3">
            <a href="{{ route('admin.gallery.video_view') }}" class="col-md-4">
                <div id="box" class="card">
                    <div class="card-header">
                        <h5>Videos</h5>
                    </div>
                    <div class="card-body"
                        style="background-image: url('{{ asset('template/img/img/videos.png') }}'); height: 40vh;">
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.gallery.image_view') }}" class="col-md-4">
                <div id="box" class="card">
                    <div class="card-header">
                        <h5>Images</h5>
                    </div>
                    <div class="card-body"
                        style="background-image: url('{{ asset('template/img/img/images.png') }}'); height: 40vh;">
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.gallery.file_view') }}" class="col-md-4">
                <div id="box" class="card">
                    <div class="card-header">
                        <h5>Files</h5>
                    </div>
                    <div class="card-body"
                        style="background-image: url('{{ asset('template/img/img/files.png') }}'); height: 40vh;">
                    </div>
                </div>
            </a>

        </div>
    @endsection
