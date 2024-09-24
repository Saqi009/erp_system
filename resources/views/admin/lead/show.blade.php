@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">All Lead</h2>
                            </div>
                            <div class="col-6 ">
                                <a href="{{ route('admin.lead') }}" style="float: right;"
                                    class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                        {{-- <div class="card-body">
                            @include('partials.alert')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="lead name!"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $lead->name }}" readonly>

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" placeholder="Lead email!"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ?? $lead->email }}" readonly>

                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" id="phone_number" name="phone_number" placeholder="lead phonenumber!"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number') ?? $lead->phone_number }}" readonly>

                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="time_zone" class="form-label">Timezone</label>
                                <input type="time_zone" class="form-control"
                                    value="{{ old('time_zone') ?? $lead->time_zone }}" readonly>

                                @error('time_zone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="remark">Remarks: </label>
                                <textarea name="remark" id="remark" cols="30" rows="6" class="form-control"
                                    placeholder="Client Remarks Here" readonly>{{ old('remark') ?? $lead->remark }}</textarea>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        Name:
                                    </div>
                                    <div class="col-8">
                                        {{ $lead->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        Email:
                                    </div>
                                    <div class="col-8">
                                        {{ $lead->email ?? '<em>N/A</em>' }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        Phone:
                                    </div>
                                    <div class="col-8">
                                        {{ $lead->phone_number }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        Timezone:
                                    </div>
                                    <div class="col-8">
                                        {{ $lead->time_zone }}
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <label for="remark">Remarks: </label>
                                    <textarea name="remark" id="remark" cols="30" rows="6" class="form-control"
                                        placeholder="Client Remarks Here" readonly>{{ old('remark') ?? $lead->remark }}</textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
