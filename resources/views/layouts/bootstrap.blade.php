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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <style>
            body {
                background-image: url('/images/background.jpg'); /* Ajusta la ruta si es necesario */
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                color: #333; /* Color de texto por defecto para contraste */
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .main-content {
                 /* Puedes añadir padding u otros estilos si necesitas espaciar el contenido del navbar/footer */
                 padding-top: 70px; /* Ejemplo: Ajusta si tu navbar tiene una altura diferente */
                 flex: 1;
            }
        </style>
    </head>
    <body>
        <!-- Navbar (using component) -->
        <x-main-navbar />

        <!-- Page Content -->
        <main class="main-content">
            {{ $slot }}
        </main>

         <!-- Footer (Example - add your actual footer here if needed) -->
        {{-- <footer class="bg-light text-center text-muted py-4 mt-auto">
            <div class="container">
                <small>&copy; {{ date('Y') }} Mediccenter. Todos los derechos reservados.</small>
            </div>
        </footer> --}}

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 