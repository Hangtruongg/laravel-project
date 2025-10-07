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

Route::post('/tasks', [TaskController::class, 'store']);

Route::post('/tasks/{task}/complete', [TaskController::class, 'complete']);

Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

Route::get('/', function () {
    $inProgressCount = Task::where('completed', false)->count();

    $tasks = Task::where('completed', false)->get();

    return view('welcome', compact(
        'tasks',
        'inProgressCount'
    ));
});