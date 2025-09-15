<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hospital</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!DOCTYPE html>

       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

       <!-- Bootstrap JS (bundle incluye Popper) -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    </head>
    <body style="background-image: url('{{ asset('img/top.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div style="background-color: transparent;">
            @include('layouts.navigation')
            @yield('content')
            <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div>
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main style="background-color: white; margin: 0 auto; max-width: 1000px; padding: 20px;">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
