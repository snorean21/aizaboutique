<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Pagina Principal')</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.6.3/css/all.css')}}">
        <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
    </head>
    <body>
        @guest
            @include('layouts.components.navbar')
        @endguest
        @if(auth()->check())
            @include('layouts.components.sidebar')
        @endif
        @if(auth()->check())
            <section class="full-box dashboard-contentPage">
                @include('layouts.components.navbar')
        @endif
                <div class="container-fluid mgn">
                    @yield('breadcrumbs')
                    @yield('content')
                </div>
            </section>
        @include('layouts.components.notificaciones')
    </body>
    <!-- scripts for all javascript-->
        <script src="{{asset('/js/app.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('/js/main.js')}}"></script>
        <script src="{{asset('/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('/js/material.min.js')}}"></script>
        <script src="{{asset('/js/ripples.min.js')}}"></script>
        <script src="{{asset('/js/sweetalert2.min.js')}}"></script>
        <!-- Data Tables JS -->
        <script src="{{asset('/js/js/datatable.js')}}"></script>
        <script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Export PDF -->
        <script src="{{asset('/js/js/pdf.js')}}"></script>
        @yield('scripts')
</html>
