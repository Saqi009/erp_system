@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h1 mb-3">Leads</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="m-0">leads</h2>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('employee.leads') }}" class="btn btn-outline-primary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lead.edit', $lead) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" placeholder="lead name!"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ? old('name') : $lead->name }}">

                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" id="email" name="email" placeholder="lead email!"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') ?? $lead->email }}">

                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">phone_number</label>
                                    <input type="text" id="phone_number" name="phone_number" placeholder="lead phone_number!"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ old('phone_number') ?? $lead->phone_number }}">

                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="time_zone" class="form-label">time_zone</label>
                                    <select id="time_zone" name="time_zone"
                                        class="form-select @error('time_zone') is-invalid @enderror">
                                        <option value="">Select a time_zone!</option>
                                        @foreach ($time_zones as $time_zone)
                                            <option value="{{ $time_zone }}" @selected(old('time_zone') ? $time_zone == old('time_zone') : $time_zone == $lead->time_zone)>
                                                {{ $time_zone }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('time_zone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="remark">Remarks: </label>
                                    <textarea name="remark" id="remark" cols="30" rows="6"  class="form-control" placeholder="Client Remarks Here">{{ old('remark') ?? $lead->remark  }}</textarea>

                                    {{-- <input type="text" value="{{ old('remark') ?? $lead->remark }}" name="remark" id="remark" class="form-control"> --}}
                                </div>
                                <div>
                                    @error('remark')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
