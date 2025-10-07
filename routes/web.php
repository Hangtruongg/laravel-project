<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post("/tasks", [TaskController::class, "store"]);

Route::post("/tasks/{task}/complete", [TaskController::class, "complete"]);

Route::delete("/tasks/{task}", [TaskController::class, "destroy"]);

Route::get("/", function () {
    $totalTasks = Task::count();
    $completedCount = Task::where("completed", true)->count();
    $tasks = Task::where("completed", false)->get();
    $inProgressCount = Task::where("completed", false)->count();

    return view(
        "welcome",
        compact("tasks", "totalTasks", "completedCount", "inProgressCount")
    )->with("activeTab", "all");
})->name("tasks.index");

Route::get("/completed", function () {
    $totalTasks = Task::count();
    $completedCount = Task::where("completed", true)->count();
    $tasks = Task::where("completed", true)->get();
    $inProgressCount = Task::where("completed", false)->count();

    return view(
        "welcome",
        compact("tasks", "totalTasks", "completedCount", "inProgressCount")
    )->with("activeTab", "completed");
})->name("tasks.completed");

Route::get("/inProgress", function () {
    $totalTasks = Task::count();
    $inProgressCount = Task::where("completed", false)->count();
    $tasks = Task::where("completed", false)->get();
    $completedCount = Task::where("completed", true)->count();

    return view(
        "welcome",
        compact("tasks", "totalTasks", "inProgressCount", "completedCount")
    )->with("activeTab", "inProgress");
})->name("tasks.inProgress");

Route::delete("/tasks/completed/delete-all", [
    TaskController::class,
    "deleteAllCompleted",
])->name("tasks.deleteAllCompleted");
