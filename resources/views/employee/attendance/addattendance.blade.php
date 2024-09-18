@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Attendance</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Stamp Your Attendance</h1>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="shift">Work shift: </label>
                            <input type="text">
                        </div>
                        <div class="mb-3">
                            <label for="fm">Floor Manager Name:</label>
                            <input type="text">
                        </div>
                        <input type="submit" class="btn btn-primary" name="" id="">
                        <div class="mb-5"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
