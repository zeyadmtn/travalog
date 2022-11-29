<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <x-navbar />
    <div class="relative items-top justify-center min-h-screen bg-white sm:items-center py-4 sm:pt-0">
        <main class="h-auto w-3/4 bg-lime-100 shadow-2xl">
            <div class="text-3xl text-center bg-red-200 w-full h-1/6 p-5">
                Community Travel Logs
            </div>
            <div class="text-xl text-center bg-lime-400 text-white w-5/6 m-auto mt-5 mb-5 rounded-xl shadow-md p-2">
                <a href="{{route('logs.index')}}" class="w-full z-10">
                    Add Travel Log
                </a>
            </div>
            <div class="bg-lime-50 w-5/6 rounded h-80 m-auto text-center mb-5">
                Dummy
            </div>
        </main>
    </div>
</body>

</html>