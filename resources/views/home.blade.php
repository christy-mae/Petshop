<x-guest-layout>
    <div class="flex flex-col items-center justify-center gap-x-6">
        <h1 class="text-2xl text-gray-800 dark:text-white">Welcome to Pawtopia</h1>
        <p class="text-gray-600 dark:text-gray-300">Find your perfect companion today!</p>
        @if (Route::has('login'))
            <nav class="flex justify-center space-x-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-4 py-2 bg-gray-700 text-white font-semibold text-lg ring-2 ring-transparent transition-colors hover:bg-gray-600 focus:outline-none focus:ring-[#FF2D20] dark:text-white dark:hover:bg-yellow-400"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-4 py-2 bg-gray-700 text-white font-semibold text-lg ring-2 ring-transparent transition-colors hover:bg-gray-600 focus:outline-none focus:ring-[#FF2D20] dark:text-white dark:hover:bg-yellow-400"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</x-guest-layout>
