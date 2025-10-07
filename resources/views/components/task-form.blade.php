<form method="POST" action="/tasks" class="relative">
    @csrf
    <div
        class="px-4 py-3 space-y-2 bg-white rounded-lg overflow-hidden border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
        <h2 class="text-base font-semibold text-gray-800">New Task</h2>
        <div>
            <label for="text" class="sr-only">Task</label>
            <textarea type="text" rows="2" id="text" name="text" placeholder="What do yuo want to do?"
                class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6"></textarea>
        </div>
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
