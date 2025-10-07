@props(['tasks', 'completedCount'])

<div class="mt-6 bg-white shadow-md rounded-xl p-6 max-w-3xl mx-auto relative">
    {{-- Top bar with title and delete all button --}}
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 flex items-end">
            <span>Completed Tasks</span>
            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full ml-2 self-end">
                {{ $completedCount ?? 0 }}
            </span>
        </h2>

        {{-- Delete all completed tasks form --}}
        @if ($completedCount > 0)
            <form method="POST" action="{{ route('tasks.deleteAllCompleted') }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-white/10 backdrop-blur-md text-red-500 border border-red-500 px-3 py-1 rounded-lg hover:bg-white/20 hover:text-red-600 transition">
                    Delete All
                </button>
            </form>
        @endif
    </div>

    <ul class="space-y-3">
        @forelse ($tasks as $task)
            <li class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                <div class="flex items-center space-x-3">
                    {{-- Task text --}}
                    <span class="text-gray-800">
                        {{ $task->text }}
                    </span>
                </div>
            </li>
        @empty
            <li class="flex items-center justify-center text-gray-500 italic py-6">
                No completed tasks yet
            </li>
        @endforelse
    </ul>
</div>
