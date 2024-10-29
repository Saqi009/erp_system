@extends('layout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Your Profile</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('employee.profile') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Form</h5>
                    </div>
                    <div class="card-body">
                        @include('partials.alert')
                        <form action="{{ route('employee.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="real_name" class="form-label">Real Name</label>
                                        <input type="text" name="real_name" id="real_name"
                                            class="form-control @error('real_name') is-invalid @enderror"
                                            value="{{ old('real_name') }}" placeholder="Enter your real name!">
                                        @error('real_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Enter your email!">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="Enter your phone!">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cnic" class="form-label">CNIC</label>
                                        <input type="text" data-inputmask="'mask': '99999-9999999-9'"
                                            class="form-control @error('cnic') is-invalid @enderror"
                                            value="{{ old('cnic') }}" id="cnic" placeholder="XXXXX-XXXXXXX-X"
                                            name="cnic">
                                        @error('cnic')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" name="dob" id="dob"
                                            class="form-control @error('dob') is-invalid @enderror"
                                            value="{{ old('dob') }}" placeholder="Enter your dob!">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_no" class="form-label">Bank Account</label>
                                        <input type="bank_no" name="bank_no" id="bank_no"
                                            class="form-control @error('bank_no') is-invalid @enderror"
                                            value="{{ old('bank_no') }}" placeholder="Enter your bank no!">
                                        @error('bank_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jd" class="form-label">Job Description</label>
                                        <input type="text" name="jd" id="jd"
                                            class="form-control @error('jd') is-invalid @enderror"
                                            value="{{ old('jd') }}" placeholder="Enter your jd!">
                                        @error('jd')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture"
                                            class="form-control @error('picture') is-invalid @enderror"
                                            value="{{ old('picture') }}" placeholder="Enter your picture!">
                                        @error('picture')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="about_me">About Me</label>
                                        <textarea name="about_me" class="form-control  @error('about_me') is-invalid @enderror" id="about_me" cols="30" rows="4"
                                            placeholder="Few lines about yourself.">{{ old('about_me') }}</textarea>
                                        @error('about_me')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Set" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
