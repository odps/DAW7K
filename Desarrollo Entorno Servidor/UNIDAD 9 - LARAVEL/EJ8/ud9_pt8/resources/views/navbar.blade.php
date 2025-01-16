<!-- Navigation -->
<nav>

    @if (Auth::check())
    <p>Bienvenido, {{ Auth::user()->name }}</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
        &nbsp;&nbsp;&nbsp;
    </form>
    @else
    <a href="{{ route('login') }}">Login</a>

    <a href="{{ route('register') }}">Register</a>
    @endif
    <a href="{{ route('home') }}">Inicio</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('cuenta_list') }}">Cuentas</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('cliente_list') }}">Clientes</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('cuenta_stats') }}">Estadisticas</a>
    &nbsp;&nbsp;&nbsp;
</nav>