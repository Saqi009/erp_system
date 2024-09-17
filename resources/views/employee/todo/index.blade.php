@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">To DO List</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-body"> --}}
                    <div class="mt-5 container w-75 m-auto ">
                        <h1 id="heading-1" class="mb-3">Todo App</h1>
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
                                                <a href="{{ route('todo.edit', $task) }}" class="btn btn-primary">Edit</a>
                                                <form style="float: left" action="{{ route('todo.destroy', $task) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                                <a href="" class="btn btn-warning">Remind</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No Records Found!</div>
                        @endif

                        <h3 id="heading-3" class="mt-3 text-white">Tasks</h3>

                        <div id="tasks-section">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
@endsection
