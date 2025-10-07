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
            "priority" => "nullable|string|in:low,medium,high",
        ]);

        $task = Task::create([
            "text" => $request->text,
            "priority" => $request->priority,
        ]);

        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->update([
            "completed" => !$task->completed,
        ]);

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    public function priority($priority)
    {
        $validPriorities = ["low", "medium", "high"];
        if (!in_array($priority, $validPriorities)) {
            abort(404);
        }

        $tasks = Task::where("priority", $priority)->get();

        // Counts for sidebar / header
        $totalTasks = Task::count();
        $inProgressCount = Task::where("completed", false)->count();
        $completedCount = Task::where("completed", true)->count();
        $highCount = Task::where("priority", "high")->count();
        $mediumCount = Task::where("priority", "medium")->count();
        $lowCount = Task::where("priority", "low")->count();

        return view(
            "welcome",
            compact(
                "tasks",
                "priority",
                "totalTasks",
                "inProgressCount",
                "completedCount",
                "highCount",
                "mediumCount",
                "lowCount"
            )
        )->with([
            "activeTab" => "priority",
            "activePriority" => $priority,
        ]);
    }

    public function deleteAllCompleted()
    {
        Task::where("completed", true)->delete();

        // Redirect back with a success message
        return redirect()->back();
    }

    private function sharedData()
    {
        return [
            "totalTasks" => Task::count(),
            "completedCount" => Task::where("completed", true)->count(),
            "inProgressCount" => Task::where("completed", false)->count(),
            "highCount" => Task::where("priority", "high")->count(),
            "mediumCount" => Task::where("priority", "medium")->count(),
            "lowCount" => Task::where("priority", "low")->count(),
        ];
    }

    public function index()
    {
        $data = $this->sharedData();
        $data["tasks"] = Task::where("completed", false)->get();
        $data["activeTab"] = "all";
        return view("welcome", $data);
    }

    public function completed()
    {
        $data = $this->sharedData();
        $data["tasks"] = Task::where("completed", true)->get();
        $data["activeTab"] = "completed";
        return view("welcome", $data);
    }

    public function inProgress()
    {
        $data = $this->sharedData();
        $data["tasks"] = Task::where("completed", false)->get();
        $data["activeTab"] = "inProgress";
        return view("welcome", $data);
    }
}
