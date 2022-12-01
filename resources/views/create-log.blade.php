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
        <div class="bg-teal-50 h-auto w-11/12 justify-center text-center mt-10 rounded-2xl py-10  shadow-inner">
            <h1 class="text-center text-black text-2xl mb-16">Add New Travel Log</h1>

            <form method="POST" action="{{  route('logs.store') }}" enctype="multipart/form-data">
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

                <label for="images">Upload your travel photos!</label></br>
                <input type="file" accept="image/*" multiple="multiple" id="images" name="images[]" class=" bg-teal-200 p-5 rounded-xl">

                <input type="submit" id="submit" class="block w-1/4 bg-teal-600 text-white mt-5 rounded-md shadow-sm m-auto h-10"></br>
            </form>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-700">*{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
        </div>

    </div>
</body>