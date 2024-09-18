@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Attendance</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class=" h2"> ADD Attendance And See Attendance Report</h1>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <a href="{{ route('attendance') }}" class="btn btn-primary">Stamp your Attendance Here </a>
                        <a href="{{ route('report') }}" class="btn btn-primary">See your report</a>
                    </div>
                    <div class="mb-5">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
