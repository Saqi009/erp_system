@extends('superadminlayout.main')

@section('title', 'Profile')

<head>
    <style>
        .file-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
        }

        .file-item {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            text-align: center;
        }
    </style>
</head>

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Files</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.gallery') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div>
        @include('partials.alert')
        @if (count($files) > 0)
            <div class="file-gallery">
                @foreach ($files as $doc)
                    <div class="file-item">
                        <p>{{ $doc->file }}</p>
                        <a href="{{ asset('template/files/' . $doc->file) }}" target="_blank">View</a>
                        <a href="{{ asset('template/files/' . $doc->file) }}" download>Download</a>
                        <form action="{{ route('superadmin.gallery.file.destroy', $doc) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="text-center"
                                style="border: none; background: none; cursor: pointer; color: red;" value="Delete">
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">No Image Found!</div>
        @endif
    </div>
@endsection
