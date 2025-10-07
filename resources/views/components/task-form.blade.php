<form method="POST" action="/tasks" class="relative">
    @csrf
    <div
        class="px-4 py-3 space-y-3 bg-white rounded-lg overflow-hidden border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">

        <h2 class="text-base font-semibold text-gray-800">New Task</h2>

        {{-- Task text input --}}
        <div class="mb-4">
            <label for="text" class="sr-only">Task</label>
            <textarea id="text" name="text" rows="2" placeholder="What do you want to do?"
                class="block w-full resize-none rounded-md border border-gray-300 bg-white py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:outline-none"></textarea>
        </div>

        {{-- Priority select --}}
        <div class="mb-4 flex items-center justify-between">
            <label for="priority" class="text-sm font-medium text-gray-700 mr-2">Priority</label>
            <div class="relative w-40">
                <select id="priority" name="priority"
                    class="block w-full appearance-none rounded-md border border-gray-300 bg-white text-gray-900 pl-3 pr-8 py-1.5 text-sm shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    <option value="" selected>— Optional —</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>

                {{-- Dropdown arrow --}}
                <svg class="absolute right-2 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        {{-- Error message + Submit --}}
        <div class="flex justify-between items-center">
            <div class="text-xs text-red-500">
                @error('text')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add
            </button>
        </div>
    </div>
</form>
