<?php

namespace App\View\Components;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskCompleted extends Component
{
    public $tasks = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tasks = Task::where("completed", true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.task-completed");
    }
}
