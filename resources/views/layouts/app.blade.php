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
        <script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Scroll Bar */
        .grayScroll::-webkit-scrollbar {
            -webkit-appearance: none;
        }

        .grayScroll::-webkit-scrollbar:vertical {
            width: 8px;
        }

        .grayScroll::-webkit-scrollbar-button:increment,
        .grayScroll::-webkit-scrollbar-button {
            display: none;
        }

        .grayScroll::-webkit-scrollbar:horizontal {
            height: 8px;
        }

        .grayScroll::-webkit-scrollbar-thumb {
            background-color: #9CA3AF;
            border-radius: 20px;
        }

        .grayScroll::-webkit-scrollbar-track {
            border-radius: 10px;
        }
        .colored-toast.swal2-icon-success {
          background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
          background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
          background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
          background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
          background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
          color: white;
        }

        .colored-toast .swal2-close {
          color: white;
        }

        .colored-toast .swal2-html-container {
          color: white;
        }

    </style>
    </head>
    <body class="bg-gray-100">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
