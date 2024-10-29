@extends('layout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Your Profile</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('employee.profile.create') }}" style="float: right" class="btn btn-primary">Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($user->email)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        {{-- @dump($user) --}}
                        <div class="row">
                            <div class="col-md-6">
                                @if ($user->picture)
                                    <img src="{{ asset('template/img/photos/' . $user->picture) }}" alt="picture"
                                        class="img-fluid rounded-circle m-2" width="280px" height="280px" />
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="picture"
                                        class="img-fluid rounded-circle m-2" width="280px" height="280px" />
                                @endif
                            </div>
                            <div class="col-md-6 align-content-center">
                                <h3><b>Psuedo Name</b> : {{ $user->name }}</h3>
                                <h3><b>Email</b> : {{ $user->email }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="mx-auto">
                            <p><b>Real Name</b> : {{ $user->real_name }}</p>
                            <p><b>CNIC</b> : {{ $user->cnic }}</p>
                            <p><b>Phone</b> : {{ $user->phone }}</p>
                            <p><b>Date of Brith</b> : {{ $user->dob }}</p>
                            <p><b>Bank Account</b> : {{ $user->bank_no }}</p>
                            <p><b>Job Description</b> : {{ $user->jd }}</p>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title mt-3"></h5>
                        </div>
                        <div class="card-body">
                            <h4>About Me</h4>
                            <p>{{ $user->about_me }}</p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">Please set your profile</div>
                @endif
            </div>
        </div>
    </div>
@endsection
