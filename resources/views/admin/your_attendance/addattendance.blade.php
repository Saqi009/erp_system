@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Attendance</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.your_attendance.show') }}" class="btn btn-primary" style="float: right">Your
                    Attendance</a>
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
                                            <form action="{{ route('admin.your_attendance.mark') }}" method="POST">
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
                                            <form action="{{ route('admin.your_attendance.leave') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="leave_reason">Leave Reason</label>
                                                    <textarea name="leave_reason" id="leave_reason" class="form-control" placeholder="Leave Reason..." rows="4"></textarea>
                                                    @error('leave_reason')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-warning">Mark Leave</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-success">You have already marked your attendance for today.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
