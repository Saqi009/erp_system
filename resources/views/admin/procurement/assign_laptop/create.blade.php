@extends('adminlayout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Assign Laptop Procurement</h1>
            </div>
            <div class="col-md-6">
                {{-- <a href="" class="btn btn-primary">Back</a> --}}
                <a href="{{ route('admin.procurement.assign_laptop_procurement') }}" style="float: right"
                    class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
            @include('adminpartials.alert')
            <form action="{{ route('admin.procurement.assign_laptop_procurement.create') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Employee Name</label>
                        <input type="text" id="name" name="name" placeholder="Employee Name!"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label">Laptop Model</label>
                        <input type="text" id="model" name="model" placeholder="Laptop Model!"
                            class="form-control @error('model') is-invalid @enderror" value="{{ old('model') }}">

                        @error('model')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label">Delivery Data</label>
                        <input type="date" id="date" name="date"
                            class="form-control
                                    @error('date') is-invalid @enderror"
                            value="{{ old('date') }}">

                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="shift" class="form-label">Shift</label>
                        <select class="form-select  @error('shift') is-invalid @enderror" name="shift" id="shift" name="shift">
                            <option value="" selected>Choose</option>
                            <option value="Day Shift">Day Shift</option>
                            <option value="Night Shift">Night Shift</option>
                        </select>

                        @error('shift')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection