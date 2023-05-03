<x-guest-layout>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-teal-300 to-teal-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold">Welcome Back Adventurer!</h1>
                        <div class="text-sm text-gray-600">Login or create a new account.</div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <label for="email" class="text-gray-600 text-sm">Email Address</label>
                                <input autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                            </div>
                            <div class="relative">
                                <label for="passowrd" class="text-gray-600 text-sm">Passowrd</label>
                                <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
                            </div>
                            <div class="text-xs text-gray-600">Don't have an account? <span class="text-blue-500 ml-2">Sign up now!</span></div>

                            <div class="w-full flex justify-end">
                                <button class=" bg-teal-500 text-white rounded-md px-7 text-sm py-1">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>