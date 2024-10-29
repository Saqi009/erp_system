@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">Lead</h2>
                            </div>
                            <div class="col-6 ">
                                <a href="{{ route('employee.leads') }}" style="float: right;"
                                    class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Name:
                                </div>
                                <div class="col-8">
                                    {{ $lead->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Email:
                                </div>
                                <div class="col-8">
                                    {{ $lead->email ?? '<em>N/A</em>' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Phone:
                                </div>
                                <div class="col-8">
                                    {{ $lead->phone_number }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    Timezone:
                                </div>
                                <div class="col-8">
                                    {{ $lead->time_zone }}
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="remark">Remarks: </label>
                                <textarea name="remark" id="remark" cols="30" rows="6" class="form-control"
                                    placeholder="Client Remarks Here" readonly>{{ old('remark') ?? $lead->remark }}</textarea>
                            </div>
                            <div>
                                <a href="{{ route('employee.lead.edit', $lead) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('employee.lead.destroy', $lead) }}" method='post' class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>

                                <a href="{{ route('employee.lead.reminder', $lead) }}" class="btn btn-success">Add Reminder</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
