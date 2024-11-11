<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get();
        $doneTasks = Task::onlyTrashed()->get();
        return view('index', compact('tasks', 'doneTasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string|max:50|min:2|unique:tasks,task',
        ]);

        Task::create($validatedData);
        return redirect()->route('task.index')->with('success', 'Task Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    
        return redirect()->route('task.index')->with('success', 'Task permanently deleted.');
    }

    public function restore($id)
{
    $task = Task::onlyTrashed()->findOrFail($id);
    $task->restore();

    return redirect()->route('task.index')->with('success', 'Task restored successfully.');
}

public function forceDelete($id)
{
    $task = Task::withTrashed()->findOrFail($id);
    $task->forceDelete();

    return redirect()->route('task.index')->with('success', 'Task permanently deleted.');
}
}
