<?php

namespace App\Http\Controllers\employee;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.todo.index', [
            'tasks' => Auth::user()->todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lists' => ['required'],
        ]);

        $data = [
            'lists' => $request->lists,
            'user_id' => Auth::id(),
        ];

        if(Todo::create($data)) {
            return redirect()->back()->with(['success' => "Task has been successfully added!"]);
        } else{
            return redirect()->back()->with(['failure' => "Oops, Operation Failed!"]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $task)
    {
        return view('employee.todo.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $task)
    {
        $request->validate([
            'lists' => ['required', 'string'],
        ]);

        $data = [
            'lists' => $request->lists,
        ];


        if($task->update($data)) {
            return redirect()->back()->with(['success' => "Task has been successfully added!"]);
        } else{
            return redirect()->back()->with(['failure' => "Oops, Operation Failed!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $task)
    {
        if ($task->delete()) {
            return redirect()->route('todo')->with(['success' => 'Delete Successfully!']);
        } else {
            return redirect()->route('todo')->with(['failure' => 'Oops, Operation Failed!']);
        }
    }
}
