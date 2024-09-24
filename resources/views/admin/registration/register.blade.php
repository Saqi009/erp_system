@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Registration</h1>

        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    @include('partials.alert')
                    <form action="{{ route('admin.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Name!">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Email!">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password!">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password
                                Confirmation</label>
                            <input type="password" class="form-control " id="password_confirmation"
                                name="password_confirmation" placeholder="Password Confirmation!">
                        </div>

                        <div class="mb-3">
                            <input type="submit" name="submit" value="Register" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
