<?php

namespace App\Http\Controllers\admin;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        return view('admin.admin_todo.index', [
            'tasks' => Auth::user()->todos
        ]);
    }

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
        } else {
            return redirect()->back()->with(['failure' => "Oops, Operation Failed!"]);
        }

    }

    public function edit(Todo $task)
    {
        return view('admin.admin_todo.edit', [
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
            return redirect()->route('admin.admin_todo')->with(['success' => 'Delete Successfully!']);
        } else {
            return redirect()->route('admin.admin_todo')->with(['failure' => 'Oops, Operation Failed!']);
        }
    }

}
