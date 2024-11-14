@extends('adminlayout.main')

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
                                    <a href="{{ route('admin.admin_lead.create') }}" class="btn btn-outline-primary">Add
                                        lead</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- @dump($leads) --}}
                            @if (count($leads) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Time Zone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($leads as $lead)
                                            <tr>
                                                <td>{{ $leads->firstItem() + $loop->index }}</td>
                                                <td>{{ $lead->name }}</td>
                                                <td>{{ $lead->email }}</td>
                                                <td>{{ $lead->time_zone }}</td>
                                                <td>
                                                    <a href="{{ route('admin.admin_lead.show', $lead) }}"
                                                        class="btn btn-primary">Show</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <div class="pagination-container">
                                                    {{ $leads->links('pagination::bootstrap-4') }}
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
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
