@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Employee Info form</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.employee') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.alert')
                    <div class="card-body">
                        <form action="{{ route('admin.employee.edit', $employee) }}" method="post">
                            @method("PATCH")
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') ?? $employee->name }}" placeholder="Name!">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                                    id="user_email" name="user_email" value="{{ old('user_email') ?? $employee->user_email }}"
                                    placeholder="Email!">
                                @error('user_email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
