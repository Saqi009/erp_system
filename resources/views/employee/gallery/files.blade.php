@extends('layout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Upload Files</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('employee.gallery') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                @include('partials.alert')
                <form action="{{ route('employee.gallery.files') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" class="form-control">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Upload File">
                </form>
            </div>
        </div>
    </div>
@endsection
