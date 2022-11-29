        <navbar class="top-0 right-0 px-6 py-4 bg-teal-800 w-full mb-4 flex flex-row justify-between">
            <img src="{{ asset('images/dropdown-menu.png')}}" alt="dropdown_icon" class="h-auto w-7">
            <span class="text-2xl text-white">TravaLog</span>
            <div class="">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </navbar>