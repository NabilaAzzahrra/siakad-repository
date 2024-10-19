<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-straight/css/uicons-solid-straight.css'>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Flsticon --}}
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    {{-- TEXT EDITOR --}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <style>
        html,
        /* body {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Roboto Mono', monospace;
            font-family: 'Source Code Pro', monospace;
        } */

        td,
        th {
            white-space: nowrap;
        }

        .dataTables_length>label {
            font-size: 14px !important;
            color: #6b7280 !important;
        }

        .dataTables_info,
        .paginate_button {
            font-size: 14px !important;
            color: #6b7280 !important;
        }

        .dataTables_length>label>select {
            font-size: 14px !important;
            padding: 3px 20px 3px 15px !important;
            border-radius: 10px !important;
            margin: 5px !important;
        }

        .dataTables_filter>label {
            font-size: 14px !important;
        }

        .dataTables_filter>label>input {
            margin: 5px !important;
            border-radius: 10px !important;
        }

        /* .js-example-placeholder-single {
            height: 1000px;
        } */

        .select2-container .select2-selection--single {
            width: 100% !important;
            background-color: #f9fafb;
            border: 1px solid #d1d5db !important;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            height: 43px;
            border-radius: 0.4rem;
            color: #1f2937;
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            top: 20% !important;
            right: 8px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 14px !important;
            top: -2px;
            left: -6px;
            position: relative;
            color: #1f2937;
        }

        .select2-search__field {
            font-size: 14px !important;
            border-radius: 0.5rem;
        }

        .select2-results {
            font-size: 14px !important;
            border-radius: 0px 10px 0px 10px;
        }
    </style>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('public/img/landing.jpg')
        }

        .bg-custom {
            /* position: relative; */
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

        /* Preloader Styles */
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            background-color: #ffffff;
            /* Background transparan 50% */
        }


        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-left-color: #000;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body class="font-sans antialiased bg-[url('/public/img/landing.jpg')] bg-contain ">
    <!-- Preloader -->
    <div id="preloader" class="">
        <div><dotlottie-player src="{{ url('json/preloader.json') }}" background="transparent" speed="1"
                class="lg:w-[600px] lg:h-[500px] hidden lg:block" loop autoplay></dotlottie-player></div>
    </div>
    <div class="min-h-screen dark:bg-gray-900 bg-white bg-opacity-65">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-8sm mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
    </div>
    <script>
        // Hide preloader and show content when the page is fully loaded
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const content = document.getElementById('content');

            // Delay hiding the preloader by 60 seconds (60000 milliseconds)
            setTimeout(function() {
                preloader.style.display = 'none'; // Hide preloader after 1 minute
                content.style.display = 'block'; // Show main content
            }, 1000); // 60000 milliseconds = 1 minute
        });
    </script>

    <script>
        // Menghubungkan CKEditor ke textarea dengan ID 'informasi'
        CKEDITOR.replace('informasi');
        CKEDITOR.replace('informasis');
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(".js-example-placeholder-single").select2({
        placeholder: "Pilih...",
        allowClear: true,
        width: '100%'
    });
</script>
@stack('scripts')

</html>
