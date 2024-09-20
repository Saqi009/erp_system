@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Attendance</h1>

        <form action="" class="row mb-4">
            <div class="col-7">
                <input type="text" class="form-control" id="search" name="search">
            </div>
            <div class="col-5">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
        {{-- @dump($attendances) --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($attendances) > 0)
                            <table class="table">
                                <thead>
                                    <th>Name</th>
                                    <th>Floor Manager</th>
                                    <th>Work Shift</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $attendance->name }}</td>
                                            <td>{{ $attendance->floor_manager }}</td>
                                            <td>{{ $attendance->work_shift }}</td>
                                            <td>{{ $attendance->date }}</td>
                                            <td>{{ $attendance->created_at->setTimezone('GMT+5')->format('h:i:s A') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No Attandance Record Found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
