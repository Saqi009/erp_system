@extends('superadminlayout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Upload Images</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.gallery') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                @include('partials.alert')
                <form action="{{ route('superadmin.gallery.images') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="image" class="form-label">image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Upload Image">
                </form>
            </div>
        </div>
    </div>
@endsection
