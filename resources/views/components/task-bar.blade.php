<nav class="space-y-2">
    {{-- All Tasks --}}
    <a href="{{ route('tasks.index') }}"
        class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.index') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
        <span>All Tasks</span>
        <span
            class="text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('tasks.index') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $totalTasks }}
        </span>
    </a>

    <hr class="border-gray-200 my-3">

    {{-- To-do Tasks --}}
    <a href="{{ route('tasks.inProgress') }}"
        class="flex justify-between items-center p-2 rounded-md
           {{ request()->routeIs('tasks.inProgress') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">

        <div class="flex items-center space-x-2">
            {{-- Pencil Icon inside square --}}
            <div
                class="flex items-center justify-center w-5 h-5 rounded-md
                   {{ request()->routeIs('tasks.inProgress') ? 'bg-indigo-400 text-white' : 'bg-gray-200 text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-3.5 h-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652l-8.25 8.25a4.5 4.5 0 01-1.897 1.13L7.5 15l.47-3.554a4.5 4.5 0 011.13-1.897l7.762-7.062z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>

            <span>To-do Tasks</span>
        </div>

        <span
            class="text-xs px-2 py-0.5 rounded-full
               {{ request()->routeIs('tasks.inProgress') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $inProgressCount }}
        </span>
    </a>

    {{-- Completed Tasks --}}
    <a href="{{ route('tasks.completed') }}"
        class="flex justify-between items-center p-2 rounded-md
           {{ request()->routeIs('tasks.completed') ? 'bg-indigo-500 text-white' : 'hover:bg-gray-100 text-gray-700' }}">

        <div class="flex items-center space-x-2">
            {{-- Check icon inside a square --}}
            <div
                class="flex items-center justify-center w-5 h-5 rounded-md
                   {{ request()->routeIs('tasks.completed') ? 'bg-indigo-400 text-white' : 'bg-gray-200 text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span>Completed Tasks</span>
        </div>

        <span
            class="text-xs px-2 py-0.5 rounded-full
               {{ request()->routeIs('tasks.completed') ? 'bg-indigo-400 text-white' : 'bg-gray-100 text-gray-600' }}">
            {{ $completedCount }}
        </span>
    </a>

    <hr class="border-gray-200 my-3">

    {{-- Collapsible Categorised Section --}}
    <details class="group" @if (request()->routeIs('tasks.priority')) open @endif>
        <summary
            class="flex justify-between items-center p-2 rounded-md cursor-pointer text-gray-700 hover:bg-gray-100 select-none">
            <span>Categorised</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4 transition-transform duration-200 group-open:rotate-180">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </summary>

        {{-- Priority Links --}}
        <div class="ml-4 mt-2 space-y-2">
            {{-- High Priority --}}
            <a href="{{ route('tasks.priority', ['priority' => 'high']) }}"
                class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.priority') && request()->route('priority') === 'high' ? 'bg-red-100 text-red-800 font-semibold' : 'hover:bg-gray-50 text-gray-700' }}">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                    <span>High</span>
                </div>
                <span class="text-xs px-2 py-0.5 rounded-full bg-red-200 text-red-800">
                    {{ $highCount ?? 0 }}
                </span>
            </a>

            {{-- Medium Priority --}}
            <a href="{{ route('tasks.priority', ['priority' => 'medium']) }}"
                class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.priority') && request()->route('priority') === 'medium' ? 'bg-yellow-100 text-yellow-800 font-semibold' : 'hover:bg-gray-50 text-gray-700' }}">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                    <span>Medium</span>
                </div>
                <span class="text-xs px-2 py-0.5 rounded-full bg-yellow-200 text-yellow-800">
                    {{ $mediumCount ?? 0 }}
                </span>
            </a>

            {{-- Low Priority --}}
            <a href="{{ route('tasks.priority', ['priority' => 'low']) }}"
                class="flex justify-between items-center p-2 rounded-md {{ request()->routeIs('tasks.priority') && request()->route('priority') === 'low' ? 'bg-blue-100 text-blue-800 font-semibold' : 'hover:bg-gray-50 text-gray-700' }}">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-blue-400"></span>
                    <span>Low</span>
                </div>
                <span class="text-xs px-2 py-0.5 rounded-full bg-blue-200 text-blue-800">
                    {{ $lowCount ?? 0 }}
                </span>
            </a>
        </div>
    </details>
</nav>
