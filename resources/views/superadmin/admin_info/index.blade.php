@extends('superadminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Admin</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.alert')
                    <div class="card-body">
                        @if (count($admins) > 0)
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
                                    @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admins->firstItem() + $loop->iteration }}</td>
                                                <td>{!! $admin->real_name ?? '<em>Null</em>' !!}</td>
                                                <td>{!! $admin->name ?? '<em>Null</em>' !!}</td>
                                                <td>{!! $admin->phone ?? '<em>Null</em>' !!}</td>
                                                <td>
                                                    <a href="{{ route('superadmin.admin_info.show', $admin) }}" class="btn btn-primary">Show More</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <div class="pagination-container">
                                                {{ $admins->links('pagination::bootstrap-4') }}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-info">No admin found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
