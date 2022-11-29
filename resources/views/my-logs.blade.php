<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create New Log</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-navbar />
    <div class="mt-5 flex flex-col ">
        @foreach ($logs as $log)
        <div class="bg-teal-100 w-5/6 rounded-xl p-10 shadow-lg h-auto m-auto mb-5 flex flex-col justify-between">
            <div class="ml-auto -mt-5 mb-3">
                @if ($log->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link>
                            Edit
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logs.destroy', $log) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('logs.destroy', $log)" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>

            <div class="flex flex-row justify-between">
                <div>
                    <p class="mr-auto text-3xl font-bold text-gray-900 mb-5">{{ $log->title }}</p>
                    <p class="mr-auto  text-gray-900">{{ $log->description }}</p>

                </div>
                <div>

                    <span class="text-gray-800">{{ $log->user->name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ $log->created_at->format('j M Y, g:i a') }}</small></br>
                    <span class="text-gray-800 text-right italic">{{ $log->country }}, {{ $log->city}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</body>