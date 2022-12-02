<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased justify-center">
    <x-navbar />
    <div class="relative min-h-screen bg-white sm:items-center sm:pt-0">
        <main class="h-auto w-3/4 bg-teal-50 rounded-xl shadow-2xl m-auto py-10">
            <div class="text-3xl text-center font-serif w-full h-1/6 p-5 bg-teal-900 text-white mb-20">
                Community Travel Logs
            </div>
            <div class="text-xl text-center bg-teal-500 text-white w-5/6 m-auto mt-2 mb-5 rounded-xl shadow-md p-2">
                <a href="{{route('logs.index')}}" class="w-full z-10">
                    Add Travel Log
                </a>
            </div>
            @if (count($logs) > 0)
            <div class="mt-5 flex flex-col">
                @foreach ($logs as $log)
                <div class="bg-teal-100 w-5/6 rounded-xl p-10 shadow-lg h-auto m-auto mb-5 flex flex-col">
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

                    <div class="flex justify-between">
                        <div class="w-8/12">
                            <p class="text-3xl font-bold text-gray-900 mb-5">{{ $log->title }}</p>
                        </div>
                        <div class="ml-5">
                            <span class="text-gray-800">{{ $log->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $log->created_at->format('j M Y, g:i a') }}</small></br>
                            <span class="text-gray-800 text-right italic">{{ $log->country }}, {{ $log->city}}</span>
                        </div>
                    </div>
                    <span class="text-gray-900 h-auto text-justify mt-10">{{ $log->description }}</span>
                    <div class="flex flex-row grow flex-wrap w-full mt-10">
                        @foreach ($log->images as $image)
                        <img src={{ asset("images/$image") }} alt="image" class="h-48 w-auto mx-10 mb-5">
                        @endforeach
                    </div>

                </div>
            </div>
            @endforeach
    </div>
    @else
    <div class="text-center text-teal-900 mt-36 text-2xl">You have no logs at the moment! :(</div>
    @endif
    </main>
    </div>
</body>

</html>