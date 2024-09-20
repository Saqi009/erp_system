@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    {{-- <div class="card-body"> --}}
                    <div class="mt-5 container m-auto ">
                        <h3 id="heading-1" class="mb-3">Todo App</h3>
                        @include('partials.alert')

                        <form action="{{ route('todo') }}" method="post" class="d-flex">
                            @csrf
                            <input type="text" placeholder="Enter the task." id="add-input"
                                class="round p-2 gap=3 form-control" name="lists">
                            <input type="submit" value="Add Task" id="btn-submit" class="btn btn-primary ml-2">
                        </form>
                        <div>
                            @error('lists')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (count($tasks) > 0)
                            <table class="table mt-5 table-bordered">
                                <thead class="table-bordered">
                                    <tr>
                                        <th>Tasks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->lists }}</td>
                                            <td style="float: right">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <a href="{{ route('todo.edit', $task) }}"
                                                            class="btn btn-primary">Edit</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <form action="{{ route('todo.destroy', $task) }}" method="post">
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
                            </table>
                        @else
                            <div class="alert alert-info">No Records Found!</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
@endsection
