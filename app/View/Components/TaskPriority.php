<?php

namespace App\View\Components;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskPriority extends Component
{
    public $tasks = [];
    public $priority;

    /**
     * Create a new component instance.
     */
    public function __construct($priority)
    {
        $this->priority = $priority;

        // Fetch only tasks with this priority
        $this->tasks = Task::where("priority", $priority)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view("components.task-priority");
    }
}
