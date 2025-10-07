<nav class="space-y-2">
    <a href="{{ route('tasks.index') }}"
        class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.index') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
        <span>All Tasks</span>
        <span
            class="text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('tasks.index') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $totalTasks }}
        </span>
    </a>

    <hr class="border-gray-200 my-3">

    <a href="{{ route('tasks.inProgress') }}"
        class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.inProgress') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
        <span>To-do Tasks</span>
        <span
            class="text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('tasks.inProgress') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $inProgressCount }}
        </span>
    </a>

    <a href="{{ route('tasks.completed') }}"
        class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.completed') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
        <span>Completed Tasks</span>
        <span
            class="text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('tasks.completed') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $completedCount }}
        </span>
    </a>
</nav>
