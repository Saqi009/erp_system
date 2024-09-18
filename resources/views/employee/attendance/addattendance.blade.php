@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Attendance</h1>
        {{-- @dump($time->toDateTimeString()) --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Stamp Your Attendance</h1>
                    </div>
                    @include('partials.alert')
                    <div class="card-body">
                        <form action="{{ route('attendance') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name: </label>
                                <input type="text" id="name" name="name" readonly value="{{ Auth::user()->name }}"
                                    placeholder="Enter work shift" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="work_shift">Work shift: </label>
                                <input type="text" id="work_shift" name="work_shift" value=""
                                    placeholder="Enter work shift" class="form-control">
                                @error('work_shift')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="floor_manager">Floor Manager Name:</label>
                                <input type="text" name="floor_manager" value=""
                                    placeholder="Enter Floor manager name" class="form-control">
                                @error('floor_manager')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date">Date</label>
                                <input type="date" name="date" value="{{ $time->toDateString() }}"
                                    class="form-control" readonly>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
