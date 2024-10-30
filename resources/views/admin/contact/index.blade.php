@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Contacts</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('partials.alert')
                    <div class="card-body">
                        @if (count($contacts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->department }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>
                                                <form action="{{ route('admin.contact.destroy', $contact->id) }}" method='post'
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No record found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
