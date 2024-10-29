@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row mb-3">
            <div class="col-md-6">
                <h1 class="h3 mb-3"></h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('attendance') }}" class="btn btn-primary" style="float: right">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Your Attendance</h1>
                    </div>
                    @include('partials.alert')
                    <div class="card-body">
                        @if (count($attendances) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Leave Reason</th>
                                    </tr>
                                </thead>
                                @foreach ($attendances as $attendance)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $attendance->date ?? '<em>N/A</em>' !!}</td>
                                            <td>{!! $attendance->created_at ? $attendance->created_at->format('g:i A') : '<em>N/A</em>' !!}</td>
                                            <td>{!! $attendance->status ?? '<em>N/A</em>' !!}</td>
                                            <td>{!! $attendance->leave_reason ?? '<em>N/A</em>' !!}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @else
                            <div class="alert alert-danger">No attendance found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
