<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <svg class="h-10" viewBox="0 0 93 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M46.4921 0C20.8522 0 0 20.8522 0 46.4921C0 65.1709 11.0718 81.314 27.0102 88.7004V82.2117C14.3792 75.2978 5.79574 61.8793 5.79574 46.4921C5.79574 24.0493 24.0493 5.79581 46.4921 5.79581C68.9349 5.79581 87.1884 24.0493 87.1884 46.4921C87.1884 68.935 68.9349 87.1885 46.4921 87.1885C45.5314 87.1885 44.5864 87.157 43.6414 87.094V19.7025L17.9228 45.0905H33.121V90.9369C34.57 91.3779 36.0504 91.7401 37.5465 92.0393V92.1338C40.4444 92.7008 43.4368 93 46.4921 93C72.1164 93 92.9843 72.1478 92.9843 46.5079C92.9843 20.8521 72.1321 0 46.4921 0Z"
                                fill="#318688" />
                            <path d="M75.0614 34.444L49.3428 9.05603V81.6449L59.8791 71.14V34.444H75.0614Z"
                                fill="#231F20" />
                        </svg>
                    </a>
                </div>
                <div class="text-2xl font-bold">
                    To-do List
                </div>
                <div class="w-10">

                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div
                class="flex max-w-7xl mx-auto my-20 rounded-xl shadow-md min-h-[80vh] 
            bg-white/10 backdrop-blur-md border border-white/20">
                <!-- Sidebar -->
                <aside class="w-64 bg-gray-50 p-6 border-r">
                    <x-task-bar :task="$tasks" :totalTasks="$totalTasks" :completedCount="$completedCount" :inProgressCount="$inProgressCount" />
                </aside>

                <!-- Main content -->
                <main class="flex-1 py-10 px-6">
                    <x-task-form />

                    @if ($activeTab === 'all')
                        <x-task-list :tasks="$tasks" :totalTasks="$totalTasks" />
                    @elseif($activeTab === 'inProgress')
                        <x-task-in-progress :tasks="$tasks" :inProgressCount="$inProgressCount" />
                    @elseif($activeTab === 'completed')
                        <x-task-completed :tasks="$tasks" :completedCount="$completedCount" />
                    @endif
                </main>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
