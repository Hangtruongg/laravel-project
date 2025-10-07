<div class="mt-4">
    <h2 class="font-semibold mb-4">Tasks</h2>

    <ul class="list-disc list-inside">
        @foreach ($tasks as $task)
            <li>
                <span>{{ $task->text }}</span>
                <form method="POST" action="/tasks/{{ $task->id }}/complete">
                    @csrf
                    <button type="submit">Complete</button>
                </form>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
