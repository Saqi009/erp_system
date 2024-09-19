@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h1 mb-3">Leads</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <button class="btn btn-primary">Add Lead</button> --}}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="m-0">leads</h2>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('lead.create') }}" class="btn btn-outline-primary">Add lead</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @session('success')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $value }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endsession

                            @session('failure')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $value }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endsession
                            {{-- @dump($leads) --}}
                            @if (count($leads) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Time Zone</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($leads as $lead)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lead->name }}</td>
                                                <td>{{ $lead->email }}</td>
                                                <td>{{ $lead->phone_number }}</td>
                                                <td>{{ $lead->time_zone }}</td>
                                                <td>{{ $lead->remark }}</td>
                                                <td>
                                                    <a href="{{ route('lead.edit', $lead) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('lead.destroy', $lead) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                        {{-- <a href="{{ route('lead.destroy', $lead) }}" class="btn btn-danger">Delete</a> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info m-0">No record found!</div>
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
