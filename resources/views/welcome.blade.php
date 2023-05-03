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
    <div class="relative min-h-screen mt-10 sm:items-center sm:pt-0">
        <main class="h-auto w-3/4 m-auto py-10">

            <div class="w-5/6 h-auto py-3 px-5 bg-white mx-auto rounded-lg  border border-gray-300 shadow-md border-opacity-30">
                <div class="items-center flex flex-row space-x-3 mb-3">

                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img class="object-fill" src="https://images.unsplash.com/photo-1600603405959-6d623e92445c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
                    </div>

                    <div class="w-full rounded-2xl bg-gray-200 px-2 py-1 text-gray-500 text-sm">
                        What's the grand title of your adventure?
                    </div>

                </div>
                <div class="w-full h-40 rounded-2xl bg-gray-200 px-4 py-3 text-gray-500 text-sm">
                    Tell the world about your adventures!
                </div>
                <div class="flex flex-row justify-between mt-4">
                    <div class="flex flex-row space-x-3">
                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="rgb(19, 78, 74)" d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="rgb(19, 78, 74)" d="M13.0605 8.11073L14.4747 9.52494C17.2084 12.2586 17.2084 16.6908 14.4747 19.4244L14.1211 19.778C11.3875 22.5117 6.95531 22.5117 4.22164 19.778C1.48797 17.0443 1.48797 12.6122 4.22164 9.87849L5.63585 11.2927C3.68323 13.2453 3.68323 16.4112 5.63585 18.3638C7.58847 20.3164 10.7543 20.3164 12.7069 18.3638L13.0605 18.0102C15.0131 16.0576 15.0131 12.8918 13.0605 10.9392L11.6463 9.52494L13.0605 8.11073ZM19.778 14.1211L18.3638 12.7069C20.3164 10.7543 20.3164 7.58847 18.3638 5.63585C16.4112 3.68323 13.2453 3.68323 11.2927 5.63585L10.9392 5.98941C8.98653 7.94203 8.98653 11.1079 10.9392 13.0605L12.3534 14.4747L10.9392 15.8889L9.52494 14.4747C6.79127 11.741 6.79127 7.30886 9.52494 4.57519L9.87849 4.22164C12.6122 1.48797 17.0443 1.48797 19.778 4.22164C22.5117 6.95531 22.5117 11.3875 19.778 14.1211Z"></path>
                        </svg>
                    </div>

                    <div class="mr-4 w-auto bg-teal-500 rounded-2xl px-8 py-1 text-white">
                        Post
                    </div>
                </div>
            </div>
            @if (count($logs) > 0)
            <div class="mt-5 flex flex-col">
                @foreach ($logs as $log)
                <div class="bg-white w-5/6 rounded-xl px-5 py-3 border border-gray-300 shadow-md border-opacity-30 h-auto m-auto mb-5 flex flex-col">
                    <div class="w-full flex flex-row">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img class="object-fill" src="https://images.unsplash.com/photo-1615109398623-88346a601842?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
                        </div>
                        <div class="ml-5">
                            <span class="text-gray-800 font-extrabold">{{ $log->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $log->created_at->format('j M Y, g:i a') }}</small></br>
                            <span class="text-gray-800 text-right italic">{{ $log->country }}, {{ $log->city}}</span>
                        </div>
                    </div>

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

                    <div class="flex justify-between font-sans mt-8">
                        <div class="w-8/12">
                            <p class="text-3xl font-bold text-gray-900 mb-5">{{ $log->title }}</p>
                        </div>
                    </div>
                    <span class="text-gray-900 h-auto text-justify mt-4">{{ $log->description }}</span>
                    <div class="flex flex-row flex-wrap w-full justify-between mt-10">
                        @foreach ($log->images as $image)
                        <img src={{ asset("images/$image") }} alt="image" class="max-h-64 w-1/2  mb-1">
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