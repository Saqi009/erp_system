@extends('superadminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Admin Info</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.admin_info') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.alert')
                    <div class="row mb-3">
                        <div class="card-body p-5 col-md-6 mx-auto ">
                            <div class="row">
                                <div class="col-4">
                                    Real Name:
                                </div>
                                <div class="col-8">
                                    {!! $admin->real_name ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Pseudo Name:
                                </div>
                                <div class="col-8">
                                    {!! $admin->name ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Date of Birth:
                                </div>
                                <div class="col-8">
                                    {!! $admin->dob ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-4">
                                    Email:
                                </div>
                                <div class="col-8">
                                    {!! $admin->email ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Phone:
                                </div>
                                <div class="col-8">
                                    {!! $admin->phone ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    CNIC:
                                </div>
                                <div class="col-8">
                                    {!! $admin->cnic ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Account Number:
                                </div>
                                <div class="col-8">
                                    {!! $admin->bank_no ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Job Description:
                                </div>
                                <div class="col-8">
                                    {!! $admin->jd ?? '<em>N/A</em>' !!}
                                </div>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <a href="{{ route('superadmin.admin_info.edit', $admin) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('superadmin.admin_info.destroy', $admin) }}" method='post' class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </div>

                            {{-- <a href="{{ route('superadmin.admin_info.password', $admin) }}">Change Admin password</a> --}}
                        </div>
                        <div class="col-md-6 align-content-center">
                            @if ($admin->picture)
                                <img src="{{ asset('template/img/photos/' . $admin->picture) }}" alt="picture"
                                    class="img-fluid rounded-circle m-2" width="280px" height="280px" />
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ $admin->name }}" alt="picture"
                                    class="img-fluid rounded-circle m-2" width="280px" height="280px" />
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
