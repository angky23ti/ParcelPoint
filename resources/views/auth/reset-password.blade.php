<x-guest-layout>
    <div class="w-full p-8 sm:p-12 md:p-16">
        <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold" style="color: #003366; margin-top: 1rem;">Sistem Ujian Online</h2>
            <p class="text-sm sm:text-base md:text-lg" style="color: #003366; margin-top: 0.5rem;">Daftar untuk memulai ujian</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm sm:text-base md:text-lg" style="color: #003366;">Nama</label>
                <input type="text" id="name" name="name" class="w-full p-3 mt-1 border rounded bg-green-100 text-sm sm:text-base md:text-lg" required autofocus>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm sm:text-base md:text-lg" style="color: #003366;">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 mt-1 border rounded bg-green-100 text-sm sm:text-base md:text-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm sm:text-base md:text-lg" style="color: #003366;">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 mt-1 border rounded bg-green-100 text-sm sm:text-base md:text-lg" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm sm:text-base md:text-lg" style="color: #003366;">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 mt-1 border rounded bg-green-100 text-sm sm:text-base md:text-lg" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full px-8 py-4 bg-blue-600 text-white text-lg sm:text-xl md:text-2xl rounded-md hover:bg-blue-500 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Daftar
                </button>
            </div>
            <!-- Reset Password -->
            <div class="flex justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm sm:text-base md:text-lg" style="color: #003366; text-decoration: underline;">Lupa kata sandi?</a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
