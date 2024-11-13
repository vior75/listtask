<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $tasks = Task::all(); // Retrieve all tasks from the database
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Create a new task
        Task::create($request->all());

        // Redirect to the tasks index with a success message
        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Update the task
        $task->update($request->all());

        // Redirect to the tasks index with a success message
        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        // Redirect to the tasks index with a success message
        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully.');
    }
}
