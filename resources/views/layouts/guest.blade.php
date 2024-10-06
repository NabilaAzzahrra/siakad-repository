<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIAKAD | TASIKMALAYA</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('public/img/landing.jpg')
        }

        .bg-custom {
            position: relative;
            z-index: 1;
            /* color: white; */
            /* Just to make content visible on the transparent background */
        }

        .bg-custom::before {
            content: '';
            background-image: url('{{ url('img/landing.jpg') }}');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            /* Adjust the transparency here */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-[url('/public/img/landing.jpg')] bg-contain">
    <div
        class="h-screen flex flex-col sm:justify-center items-center lg:pt-6 dark:bg-gray-900 px-6 lg:px-0 pt-[180px] bg-white bg-opacity-65">
        <div class="flex mb-2 gap-10" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
            <div>
                <img src="{{ url('img/logo-lp3i.png') }}" alt="" srcset="" class="lg:w-[200px] w-[130px]">
            </div>
            <div>
                <img src="{{ url('img/gmu.png') }}" alt="" srcset="" class="lg:w-[150px] w-[100px]">
            </div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
            data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-delay="600">
            {{ $slot }}
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            // easing="ease-in-out"
        });
    </script>
</body>

</html>
