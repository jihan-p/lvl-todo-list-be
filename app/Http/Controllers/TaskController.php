<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks = Task::orderBy('priority')->orderBy('created_at', 'desc')->get();

            return response()->json($tasks);
        } catch (Exception $e) {
            // Log the actual error for debugging
            Log::error('Error fetching tasks: ' . $e->getMessage());

            // Return a generic server error response to the client
            return response()->json([
                'message' => 'An error occurred while fetching tasks.',
                'error' => $e->getMessage() // Consider removing this in production for security
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'sometimes|integer|between:1,3',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validateData);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validateData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'priority' => 'sometimes|integer|between:1,3',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validateData);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }

    public function complete(Task $task)
    {
        $task->update(['status' => true]);

        return response()->json($task);
    }
}
