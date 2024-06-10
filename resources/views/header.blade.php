<header class="header">
    <a href="#" class="logo">
        <img src="{{asset('img/logoatp.png')}}" width="150px" alt="Logo de La página">
    </a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
        <li><a href="{{ route('tenistas.index') }}">Tenistas</a></li>
        <li><a href="{{ route('torneos.index') }}">Torneos</a></li>
        @guest
            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>

            @else

            <li>
                <a>{{ auth()->user()->name }}</a>
                <ul class="menu-vertical">
                    <li>
                        <a onclick="document.getElementById('logout-form').submit();" class="btn-link">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        @endguest


    </ul>
</header>
