@extends('superadminlayout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Assign Laptops</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.procurement.assign_laptop_procurement.create') }}" class="btn btn-primary">Add</a>
                <a href="{{ route('superadmin.procurement') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="card">
            @if (count($laptops) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Employee Name</th>
                            <th>Laptop Model</th>
                            <th>Shift</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laptops as $laptop)
                            <tr>
                                <td>{{ $loop->iteration . '.' }}</td>
                                <td>{{ $laptop->name }}</td>
                                <td>{{ $laptop->model }}</td>
                                <td>{{ $laptop->shift }}</td>
                                <td>{{ $laptop->date }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form
                                                action="{{ route('superadmin.procurement.assign_laptop_procurement.edit', $laptop) }}"
                                                method="get">
                                                @csrf
                                                <button style="border: none" type="submit" name="submit"><i
                                                        class="fa-regular fa-pen-to-square"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form
                                                action="{{ route('superadmin.procurement.assign_laptop_procurement.destroy', $laptop) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none" name="submit"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div class="pagination-container">
                                    {{ $laptops->links('pagination::bootstrap-4') }}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="alert alert-info">No Record Found!</div>
            @endif
        </div>

    </div>

@endsection
