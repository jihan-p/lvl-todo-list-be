<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('priority')->latest()-get();

        return response()->json($tasks);
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
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'nullable|integer|between:1,3',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create([
            'name' => $validateData['name'],
            'priority' => $validateData['priority'] ?? 3,
            'due_date' => $validateData['due_date'] ?? null,
            'status' => false,
        ]);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $tasks)
    {
        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validateData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'priority' => 'sometimes|integer|between:1,3',
            'due_date' => 'nullable|date',
            'status' => 'sometimes|booelan',
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
