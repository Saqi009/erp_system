@extends('layout.main')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Edit Task</h1>

        <div class="row">
            <div class="col-12">
                <div class="card p-5">
                    {{-- <div class="card-body"> --}}
                    <div class="mt-5 container w-75 m-auto ">
                        <h1 id="heading-1" class="mb-3">Edit Task</h1>
                        @include('partials.alert')
                        <form action="{{ route('todo.update', $task) }}" method="post" class="d-flex">
                            @method('PATCH')
                            @csrf
                            <input type="text" placeholder="Enter the task." id="add-input"
                                class="round p-2 gap=3 form-control" name="lists"
                                value="{{ old('lists') ?? $task->lists }}">
                            <input type="submit" value="Update" id="btn-submit" class="btn btn-primary ml-2">
                            <a href="{{ route('todo') }}" class="btn btn-secondary">Back</a>
                        </form>
                        <div>
                            @error('lists')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    {{-- </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
