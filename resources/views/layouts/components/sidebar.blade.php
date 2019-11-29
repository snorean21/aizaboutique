<!-- SideBar -->
<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            {{ config('app.name') }} <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                @if(auth()->user()->avatar == 'default.jpg ')
                    <img src="{{Storage::url('default.jpg')}}" alt="">
                @else
                    <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}">
                @endif
                <figcaption class="text-center text-titles">{{ auth()->user()->name }}</figcaption>
                <figcaption class="text-center text-titles">{{ auth()->user()->roles->first()->name }}</figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="zmdi zmdi-home"></i>
                    </a>
                </li>
                @can('user.miperfil')
                    <li>
                        <a href="{{ URL('miperfil') }}">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('logout') }}" class="btn-exit-system"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form');">
                        <i class="zmdi zmdi-power"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                    </a>
                </li>
            </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            @can('user.index','role.index')
                <li>
                    <a class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Acceso <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            @can('user.index')
                                <a href="{{url('user')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Usuarios</a>
                            @endcan
                        </li>
                        <li>
                            @can('role.index')
                                <a href="{{url('role')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Roles</a>
                            @endcan
                        </li>
                    </ul>
                </li>
            @endcan
            @can('category.index', 'product.index', 'color.index', 'tallas.index')
                <li>
                    <a class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Catalogo <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            @can('product.index')
                                <a href="{{url('product')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Productos</a>
                            @endcan
                        </li>
                        <li>
                            @can('category.index')
                                <a href="{{url('category')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Categorias</a>
                            @endcan
                        </li>
                        <li>
                            @can('material.index')
                                <a href="{{url('material')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Materiales</a>
                            @endcan
                        </li>
                        <li>
                            @can('color.index')
                                <a href="{{url('color')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Colores</a>
                            @endcan
                        </li>
                        <li>
                            @can('size.index')
                                <a href="{{url('size')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Tallas</a>
                            @endcan
                        </li>
                        <li>
                            @can('price.index')
                                <a href="{{url('price')}}"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>Precios</a>
                            @endcan
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</section>