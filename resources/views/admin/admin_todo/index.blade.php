@extends('adminlayout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    {{-- <div class="card-body"> --}}
                    <div class="mt-5 container m-auto ">
                        <h3 id="heading-1" class="mb-3">Todo App</h3>
                        @include('partials.alert')

                        <form action="{{ route('admin.admin_todo') }}" method="post" class="d-flex row">
                            @csrf
                            <div class="col-md-9">
                                <input type="text" placeholder="Enter the task." id="add-input"
                                    class="round p-2 gap=3 form-control" name="lists">
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Add Task" id="btn-submit" class="btn btn-primary ml-2">
                            </div>
                        </form>
                        <div>
                            @error('lists')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (count($tasks) > 0)
                            <table class="table mt-5 ">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th class="col-8">Tasks</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $tasks->firstItem() + $loop->index }}</td>
                                            <td>{{ $task->lists }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6 text-end">
                                                        <a href="{{ route('admin.admin_todo.edit', $task) }}"
                                                            class="btn btn-primary">Edit</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <form action="{{ route('admin.admin_todo.destroy', $task) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger ml-2"
                                                                value="Delete">
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
                                                {{ $tasks->links('pagination::bootstrap-4') }}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-info mt-3">No Records Found!</div>
                        @endif
                    </div>

                {{-- </div> --}}
            </div>
        </div>
    </div>
    </div>
@endsection
