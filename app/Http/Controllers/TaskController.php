<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show the list of tasks
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('show.login');
        }

        // Fetch all tasks and pass them to the view
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Store a new task
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,completed',
        ]);

        // Create a new task with the request data
        Task::create($request->all());

        // Redirect back to the task index page
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Return task data for editing (used by AJAX)
    public function edit(Task $task)
{
    // Return task data as JSON for the modal
    return response()->json($task);
}

    // Update an existing task
   
public function update(Request $request, Task $task)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:pending,completed',
    ]);
        // Update the task with the request data
        $task->update($request->all());

        // Redirect back to the task index page
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        // Delete the task
        $task->delete();

        // Redirect back to the task index page
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
