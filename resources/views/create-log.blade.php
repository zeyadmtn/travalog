<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create New Log</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <div class="relative flex flex-col items-top justify-center min-h-screen bg-white sm:items-center py-4 sm:pt-0">
        <x-navbar />
        <div class="bg-lime-50 h-auto w-11/12 justify-center text-center mt-10">
            <h1 class="text-center text-black text-xl mb-5">Add New Travel Log</h1>

            <form method="POST" action="{{  route('logs.store') }}">
                @csrf
                <label for="title">Log Title</label></br>
                <input type="text" id="title" name="title" class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-auto"></br>

                <label for="description">Log Description</label></br>
                <textarea name="description" id="description" placeholder="How was your experience?" class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-auto">

                </textarea>

                <label for="date">When did you travel there?</label></br>
                <input type="date" id="date" name="date" class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-auto"></br>

                <label for="country">Which country was this in?</label></br>
                <input type="text" id="country" name="country" class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-auto"></br>

                <label for="city">Which city was this in?</label></br>
                <input type="text" id="city" name="city" class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-auto"></br>

                <!-- <label for="images">Upload your travel photos!</label></br>
                <input type="file" accept="image/*" multiple="multiple" id="images" name="images" class=" bg-lime-200 p-5 rounded-xl"> -->

                <input type="submit" id="submit" class="block w-1/4 bg-lime-600 text-white mt-5 rounded-md shadow-sm m-auto h-10"></br>
            </form>
        </div>
<!-- 
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($logs as $log)
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $log->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $log->created_at->format('j M Y, g:i a') }}</small>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $log->title }}</p>

                </div>
            </div>
            @endforeach
        </div> -->

    </div>
</body>