@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-6">
                                <h2 class="m-0">Add lead</h2>
                            </div>
                            <div class="col-6 ">
                                <a href="{{ route('employee.leads') }}" style="float: right;"
                                    class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.alert')
                    <form action="{{ route('lead.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="lead name!"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" placeholder="lead email!"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="lead phone_number!"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                value="{{ old('phone_number') }}">

                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time_zone" class="form-label">Timezone</label>
                            <select id="time_zone" name="time_zone"
                                class="form-select @error('time_zone') is-invalid @enderror">
                                <option value="">Select a time_zone!</option>
                                @foreach ($time_zones as $time_zone)
                                    <option value="{{ $time_zone }}" @selected($time_zone == old('time_zone'))>
                                        {{ $time_zone }}</option>
                                @endforeach
                            </select>

                            @error('time_zone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="remark">Remarks: </label>
                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control"
                                placeholder="Client Remarks Here"></textarea>
                            {{-- <input type="text" name="remark" id="remark" class="form-control"> --}}
                        </div>
                        <div>
                            @error('remark')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="submit" name="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
