<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/svg+xml" href="../modern/src/assets/images/logos/Ujify-LogoOnly.svg" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-r from-green-600 to-green-400">
        <!-- Area Konten -->
        <div class="min-h-screen flex">
            <!-- Sisi Kiri -->
            <div class="flex-1 bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/background-image.jpg') }}');">
                <img src="{{ asset('../modern/src/assets/images/backgrounds/Learning2.png') }}" alt="Learning" class="max-w-full max-h-full object-contain"
                        style="">
            </div>

            <!-- Sisi Kanan -->
            <div class="flex-1 flex items-center justify-center p-8 sm:p-16">
                <div class="w-full max-w-6xl shadow-2xl rounded-lg overflow-hidden bg-white h-[600px] transform hover:scale-105 transition-all">
                    <!-- Bagian Kanan Atas -->
                    <div class="bg-green-800 text-white flex-1 p-12 flex flex-col items-center justify-center text-center">
                        <img src="{{ asset('../modern/src/assets/images/logos/Ujify-Logo.svg') }}" alt="Logo" class="w-12 h-12 mb-6 rounded-full shadow-lg transition-transform transform hover:rotate-6">
                    </div>
                    <!-- Ambil proses dari file login/regis/reset / Bagian kanan bawah -->
                    <div class="bg-white flex-1 flex items-center justify-center p-8">
                        <div class="w-full sm:max-w-md p-8 rounded-xl shadow-xl bg-gray-50">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center mt-12 text-green-700 text-sm">
            <p>Copyright by Ujify &copy; 2024</p>
        </footer>
    </body>
</html>
