<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "text" => "required|string|max:255",
        ]);

        $task = Task::create([
            "text" => $request->text,
        ]);

        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->update([
            'completed' => !$task->completed, 
        ]);

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}