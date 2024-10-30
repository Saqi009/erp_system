@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Employees</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.alert')
                    <div class="card-body">
                        @if (count($employees) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Real Name</th>
                                        <th>Pseudo Name</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{!! $employee->real_name ?? '<em>Null</em>' !!}</td>
                                                <td>{!! $employee->name ?? '<em>Null</em>' !!}</td>
                                                <td>{!! $employee->phone ?? '<em>Null</em>' !!}</td>
                                                <td>
                                                    <a href="{{ route('admin.employee.show', $employee) }}" class="btn btn-primary">Show More</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No employee found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
