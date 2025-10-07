@props(['tasks', 'inProgressCount'])

@php
    $priorityOrder = ['high', 'medium', 'low', null];
    $tasks = $tasks->sortBy(function ($task) use ($priorityOrder) {
        // Tasks with no priority get last
        return array_search($task->priority, $priorityOrder);
    });
@endphp

<div class="mt-6 bg-white shadow-md rounded-xl p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-end">
        <span>To-do Tasks</span>
        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full ml-2 self-end">
            {{ $inProgressCount ?? 0 }}
        </span>
    </h2>

    <ul class="space-y-3">
        @forelse ($tasks as $task)
            <li class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                <div class="flex items-center space-x-3">
                    {{-- Complete checkbox --}}
                    <form method="POST" action="/tasks/{{ $task->id }}/complete"
                        id="complete-form-{{ $task->id }}">
                        @csrf
                        <input type="checkbox" name="completed"
                            onChange="document.getElementById('complete-form-{{ $task->id }}').submit();"
                            {{ $task->completed ? 'checked' : '' }}
                            class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                    </form>

                    {{-- Task text + Priority --}}
                    <div class="flex items-center space-x-2">
                        <span class="text-gray-800 {{ $task->completed ? 'line-through text-gray-400' : '' }}">
                            {{ $task->text }}
                        </span>

                        @if ($task->priority)
                            @php
                                $colors = [
                                    'low' => 'bg-blue-100 text-blue-700',
                                    'medium' => 'bg-yellow-100 text-yellow-700',
                                    'high' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span
                                class="text-xs px-2 py-0.5 rounded-full font-medium {{ $colors[$task->priority] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Delete button --}}
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-5 h-5 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition"
                        title="Delete task">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>
                    </button>
                </form>
            </li>
        @empty
            <li class="flex items-center justify-center text-gray-500 italic py-6">
                No tasks in progress
            </li>
        @endforelse
    </ul>
</div>
