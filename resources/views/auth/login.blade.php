<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <!-- Wrapper Container -->
        <div class="flex w-full max-w-screen-xl bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden">
            <!-- Left Side: Image/Illustration -->
            <div class="hidden lg:flex lg:w-1/2 bg-indigo-600 dark:bg-indigo-700 items-center justify-center">
                <img src="{{ url('assets/images/illustration.svg') }}" alt="Illustration" class="w-4/5 h-auto">
            </div>

            <!-- Right Side: Login Form -->
            <div class="w-full lg:w-1/2 p-12 sm:p-16">
                <!-- Header -->
                <div class="text-center mb-10">
                    <img src="{{ url('assets/images/logo.svg') }}" alt="Logo" class="mx-auto w-48">
                    <h2 class="text-4xl font-bold text-gray-800 dark:text-white mt-6">Sistem Ujian Online</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Masuk untuk memulai ujian</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-lg" />
                        <x-text-input id="email" class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-lg px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-6">
                        <x-input-label for="password" :value="__('Password')" class="text-lg" />
                        <x-text-input id="password" class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-lg px-4 py-3" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-6">
                        <label for="remember_me" class="inline-flex items-center text-lg">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-8">
                        @if (Route::has('password.request'))
                            <a class="text-lg text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Lupa kata sandi?') }}
                            </a>
                        @endif

                        <x-primary-button class="ms-3 px-8 py-3 text-lg">
                            {{ __('Masuk') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="text-center mt-8">
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
