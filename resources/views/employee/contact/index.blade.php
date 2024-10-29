@extends('layout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Contact</h1>
            </div>
            <div class="col-md-6">
                {{-- <a href="" style="float: right" class="btn btn-primary">Add</a> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contact</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('employee.contact.send_email') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select name="department" class="form-select @error('department') is-invalid @enderror" id="department">
                                    <option value="">Select email</option>
                                    <option value="hr">HR (Wardah)</option>
                                    <option value="it">IT (Ajmeer)</option>
                                    <option value="lisa">FM (Lisa)</option>
                                    <option value="ilsa">FM (Ilsa)</option>
                                    <option value="ellen">AE (Ellen)</option>
                                    <option value="roy">AE (Roy)</option>
                                    <option value="chris">AE (Chris)</option>
                                </select>
                                @error('department')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="4" placeholder='Type your message here..'>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Send" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
