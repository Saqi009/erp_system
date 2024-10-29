@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-6">
                <h1 class="h1 mb-3">Reminder</h1>
            </div>
            <div class="col-md-6">
                <a style="float: right" href="{{ route('employee.leads') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        {{-- @dump($reminders) --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <button class="btn btn-primary">Add Lead</button> --}}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="m-0">Reminder</h2>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#add">
                                        Add Reminder
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($reminders) > 0)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Reminder Name</th>
                                                <th>Remind me at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reminders as $reminder)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $lead->name }}</td>
                                                    <td>{{ $reminder->reminder_time }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#edit">
                                                            Edit
                                                        </button>
                                                        <a href="" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-danger">No reminder found!</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLabel">Set Reminder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employee.lead.reminder.store', $lead) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="reminder_time">Reminder Time</label>
                                <input type="datetime-local" class="form-control" name="reminder_time" id="reminder_time"
                                    placeholder="Reminder time">
                                @error('reminder_time')
                                    {{ $message }}
                                @enderror

                                <button type="submit">Set</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Set Reminder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employee.lead.reminder.store', $lead) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="reminder_time">Reminder Time</label>
                                <input type="datetime-local" class="form-control" name="reminder_time" id="reminder_time"
                                    placeholder="Reminder time">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
