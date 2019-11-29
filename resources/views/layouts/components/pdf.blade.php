<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <title>@yield('title', 'Pagina Principal')</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
    <script src="{{asset('/js/app.js')}}"></script>
</html>