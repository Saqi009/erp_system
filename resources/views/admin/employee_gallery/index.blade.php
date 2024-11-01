@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Employees Gallery</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @foreach ($images as $image)
                            <p>{{ $image->image }}</p>
                        @endforeach --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ali</td>
                                    <td>
                                        <a href="" class="btn btn-outline-info">Show</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
