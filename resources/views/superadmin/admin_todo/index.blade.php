@extends('superadminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <div class="mt-5 container m-auto ">
                        <h3 id="heading-1" class="mb-3">Todo App</h3>
                        @include('partials.alert')

                        <div>
                            @error('lists')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (count($tasks) > 0)
                            <table class="table mt-5 table-bordered">
                                <thead>
                                    <tr>
                                        <th>Admins Name</th>
                                        <th class="col-8">Tasks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->lists }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <div class="pagination-container">
                                                {{ $tasks->links('pagination::bootstrap-4') }}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-info">No Records Found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

