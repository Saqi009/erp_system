@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Attendance</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('addattendance.yourattendance') }}" class="btn btn-primary" style="float: right">Your Attendance</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Stamp Your Attendance</h1>
                    </div>
                    @include('partials.alert')
                    <div class="card-body">
                        <div class="row">
                            <div>
                                @if (!$markedToday)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{ route('employee.attendance.mark') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="work_shift">Work Shift</label>
                                                    <input type="text" class="form-control" id="work_shift"
                                                        name="work_shift" placeholder="Work Shift">
                                                    @error('work_shift')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="floor_manager">Floor Manager</label>
                                                    <input type="text" name="floor_manager" class="form-control"
                                                        id="floor_manager" placeholder="Floor Manager Name">
                                                    @error('floor_manager')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary">Mark Attendance</button>
                                            </form>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-md-6">
                                            <form action="{{ route('employee.attendance.leave') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="leave_reason">Leave Reason</label>
                                                    <textarea name="leave_reason" id="leave_reason" class="form-control" placeholder="Leave Reason..." rows="4"></textarea>
                                                    @error('leave_reason')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label for="work_shift_leave">Work Shift</label>
                                                    <input type="text" class="form-control" id="work_shift_leave"
                                                        name="work_shift_leave" placeholder="Work Shift">
                                                    @error('work_shift_leave')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="floor_manager_leave">Floor Manager</label>
                                                    <input type="text" class="form-control" name="floor_manager_leave"
                                                        id="floor_manager_leave" placeholder="Floor Manager Name">
                                                    @error('floor_manager_leave')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}
                                                <button type="submit" class="btn btn-warning">Mark Leave</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-success">You have already marked your attendance for today.</p>
                                @endif
                            </div>

                            {{-- <div class="col-md-8">
                                <h3>Your Attendance Records</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendances as $attendance)
                                            <tr>
                                                <td>{{ $attendance->date }}</td>
                                                <td>{{ $attendance->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
