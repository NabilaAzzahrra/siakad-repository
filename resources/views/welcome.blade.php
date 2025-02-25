<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD | TASIKMALAYA</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- GSAP --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>

    {{-- Tailwindcss --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

{{-- <body
    class="min-h-screen lg:h-screen lg:bg-center bg-[url('img/building.jpg')] lg:bg-no-repeat bg-gray-500 bg-blend-multiply lg:bg-cover bg-repeat-y lg:px-96 lg:py-72 py-40 text-white text-center"> --}}

<body
    class="font-sans text-gray-900 antialiased bg-[url('img/building.jpg')] bg-no-repeat bg-cover bg-gray-500 bg-blend-multiply">

    {{-- <div class="items-center justify-center"> --}}
    <div
        class="h-screen flex flex-col sm:justify-center items-center lg:pt-6 dark:bg-gray-900 lg:px-0 pt-[180px] ">
        @if (Route::has('login'))
            <div class="flex mb-4 gap-5 justify-center ml-36 lg:ml-0 lg:justify-start box-logo">
                <div>
                    <img src="{{ url('img/logo-lp3i-white.png') }}" class="lg:w-[200px] w-[180px]">
                </div>
                <div>
                    <img src="{{ url('img/gmu-white.png') }}" class="lg:w-[150px] w-[150px]">
                </div>
            </div>
            <div class="text-white font-extrabold ml-32 lg:ml-0 lg:text-2xl text-xl box-title lg:mb-4 text-center">
                Sistem Informasi Akademik (SIAKAD)
            </div>
            <div class="text-md text-center lg:mb-8 w-[550px] ml-32 lg:ml-0 p-12 lg:p-0 box-keterangan -mt-8 lg:mt-0 text-white">
                Efisiensi, Transparansi, dan Kemudahan Akses dalam Satu Platform Sistem Informasi Akademik kami
                memudahkan manajemen data akademik secara cepat dan akurat. Mulai dari pendaftaran mata kuliah hingga
                pemantauan hasil belajar, semua bisa diakses dalam satu platform yang intuitif. Dengan fitur real-time
                dan akses yang mudah, Anda dapat mengelola perjalanan akademik Anda dengan lebih efisien dan fokus pada
                kesuksesan.
            </div>
            @auth
                <div class="box-button">
                    <a href="{{ route('login') }}"
                        class="bg-white hover:bg-gray-500 py-2 px-8 rounded-2xl font-bold text-black shadow-lg hover:border-gray-700 hover:border-2 hover:text-white">Dashboard</a>
                </div>
            @else
                <div class="box-button ml-32 lg:ml-0">
                    <a href="{{ route('login') }}"
                        class="bg-white hover:bg-gray-500 py-2 px-8 rounded-2xl font-bold text-black shadow-lg hover:border-gray-700 hover:border-2 hover:text-white">Masuk</a>
                </div>
            @endauth
        @endif
    </div>

    <script>
        gsap.fromTo(
            ".box-logo", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 2.5
            }
        );
        gsap.fromTo(
            ".box-title", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 2
            }
        );
        gsap.fromTo(
            ".box-keterangan", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 1.5
            }
        );
        gsap.fromTo(
            ".box-button", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 1,
                ease: "bounce.out"
            }
        );
    </script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
