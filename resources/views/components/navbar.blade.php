        <navbar class="fixed top-0 right-0 px-6 py-4 sm:flex bg-lime-600 w-full shadow-xl mb-4">
            <span class="text-2xl text-white">MOREICON</span>
            <span class="text-2xl text-white mx-auto">TravaLog</span>
            <div class="ml-auto">
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