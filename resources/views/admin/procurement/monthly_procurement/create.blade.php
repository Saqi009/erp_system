@extends('adminlayout.main')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Add Procurement</h1>
            </div>
            <div class="col-md-6">
                {{-- <a href="" class="btn btn-primary">Back</a> --}}
                <a href="{{ route('admin.procurement.monthly_procurement') }}" style="float: right"
                    class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
            @include('adminpartials.alert')
            <form action="{{ route('admin.procurement.monthly_procurement.create') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" id="name" name="name" placeholder="Product Name!"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" id="quantity" name="quantity" placeholder="Quantity!"
                            class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">

                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="text" id="unit_price" name="unit_price" placeholder="Unit Price!"
                            class="form-control @error('unit_price') is-invalid @enderror" value="{{ old('unit_price') }}">

                        @error('unit_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="supplier_name" class="form-label">Supplier Name</label>
                        <input type="text" id="supplier_name" name="supplier_name" placeholder="supplier_name!"
                            class="form-control @error('supplier_name') is-invalid @enderror"
                            value="{{ old('supplier_name') }}">

                        @error('supplier_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="delivery_date" class="form-label">Delivery Data</label>
                        <input type="date" id="delivery_date" name="delivery_date"
                            class="form-control
                                    @error('delivery_date') is-invalid @enderror"
                            value="{{ old('delivery_date') }}">

                        @error('delivery_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="text" id="total_price" name="total_price" placeholder="Total Price!"
                            class="form-control @error('total_price') is-invalid @enderror"
                            value="{{ old('total_price') }}">

                        @error('total_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection
