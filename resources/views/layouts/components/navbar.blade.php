<nav class="full-box dashboard-Navbar navbar-dark">
    <ul class="full-box list-unstyled text-right">
        @guest
            <div class="container">
                <a class="navbar-brand" href="{{ URL('/') }}">
                    {{ config('app.name') }}
                </a>
                <ul class="nav justify-content-end ull">
                    <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </ul>
            </div>
        @else
            <li class="pull-left">
                <a class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
            </li>
            <li>
                <a href="#" class="btn-Notifications-area">
                    <i class="zmdi zmdi-notifications-none"></i>
                    <span class="badge">7</span>
                </a>
            </li>
        @endguest
    </ul>
</nav>