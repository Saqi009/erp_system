@extends('adminlayout.main')

@section('title', 'Profile')

<head>
    <style>
        #box .card-body {
            background-size: cover;
        }

        #box {
            border-radius: 10px;
        }

        #box:hover {
            box-shadow: 2px 2px 7px
        }
    </style>
</head>

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Monthly Procurement</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.procurement.monthly_procurement.create') }}" class="btn btn-primary">Add</a>
                <a href="{{ route('admin.procurement') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
        {{-- @dump($procurements) --}}
        <div class="card">
            @if (count($procurements) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Supplier Name</th>
                            <th>Delivery Date</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procurements as $procurement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $procurement->name }}</td>
                                <td>{{ $procurement->quantity }}</td>
                                <td>{{ $procurement->unit_price }}</td>
                                <td>{{ $procurement->supplier_name }}</td>
                                <td>{{ $procurement->delivery_date }}</td>
                                <td>{{ $procurement->total_price }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form
                                                action="{{ route('admin.procurement.monthly_procurement.edit', $procurement) }}"
                                                method="get">
                                                @csrf
                                                <button style="border: none" type="submit" name="submit"><i
                                                        class="fa-regular fa-pen-to-square"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form
                                                action="{{ route('admin.procurement.monthly_procurement.destroy', $procurement) }}"
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
                </table>
            @else
                <div class="alert alert-info">No Record Found!</div>
            @endif
        </div>

    </div>

@endsection
