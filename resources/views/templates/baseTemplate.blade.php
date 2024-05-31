<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img_estaticas/logo.png') }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/161f7db9b3.js" crossorigin="anonymous"></script>
</head>
<body class="min-w-full bg-stone-950">
    <nav id="header" class="flex items-center justify-between pr-8 w-full z-30 bg-zinc-500/5 text-white fixed top-0">
        <div id="headerLeft" class="flex items-center justify-between">
            <div id="logo" class="w-20">
                <a href="/">
                    <img id="logoImg" src="{{ asset('img_estaticas/logo.png') }}" class="relative z-40" alt="Mesón Sagrada Familia">
                </a>
            </div>
            <div id="navButtons" class="md:flex md:gap-10 hidden">
                <a href="/">Inicio</a>
                <a href="/carta">Carta</a>
                @if(Auth::user())
                    <a href="/cupones">Cupones</a>
                    @foreach (Auth::user()->allTeams() as $team)
                        @if($team->name == 'Admin')
                            <a href="/admin_gestion_platos">Gestión Platos</a>
                            <a href="/admin_reservas">Gestión Reservas</a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>


        <div id="profileLogin" class="md:flex md:gap-6 hidden">
            @if (Auth::user())
                <p id="userHeader" class="cursor-pointer">Hola, {{ Auth::user()->name }} <i id="" class="fa-solid fa-angle-down"></i></p>
                <div id="desplegableUser" class="absolute z-50 bg-black text-white rounded-md px-6 py-4 flex flex-col gap-4 justify-around items-center w-60 right-6 top-14 hidden">
                    <a href="/user/pedidos">Mis Pedidos</a>
                    <a href="/user">Mi Perfil</a>
                    <a href="/user/favoritos">Mis Favoritos</a>
                    <a href="/user/reservas">Mis Reservas</a>
                    <a href="/logout">Cerrar sesión</a>
                </div>
            @else
                <a href="/register">Regístrate</a>
                <a href="/login">Inicia Sesión</a>
            @endif
        </div>

        <div id="hamburguesa" class="md:hidden py-2">
            <svg id="svgHamburguesa" class="block h-6 w-6 fill-current cursor-pointer" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </div>
        <div id="menuMobile" class="hidden absolute z-50 top-0 h-screen w-screen bg-black text-white flex flex-col justify-between">
            <div id="mobileTop" class="ps-3">
                <div id="topBack" class="flex justify-between items-center pb-4">
                    @if (Auth::user())
                        <p id="userHeader" class="pt-6 font-bold">Hola, {{ Auth::user()->name }}</p>
                    @else
                        <p></p>
                    @endif
                    <i id="mobileBack" class="fa-solid fa-arrow-left text-white py-4 text-2xl cursor-pointer px-14"></i>
                </div>

                <div id="mobileEnlaces" class="flex flex-col gap-6">
                    <a href="/">Inicio</a>
                    <a href="/carta">Carta</a>
                    @if (Auth::user())
                        <a href="/cupones">Cupones</a>
                        <a href="/user/pedidos">Mis Pedidos</a>
                        <a href="/user">Mi Perfil</a>
                        <a href="/user/favoritos">Mis Favoritos</a>
                        <a href="/user/reservas">Mis Reservas</a>

                        @foreach (Auth::user()->allTeams() as $team)
                        @if($team->name == 'Admin')
                            <a href="/admin_gestion_platos">Gestión Platos</a>
                            <a href="/admin_reservas">Gestión Reservas</a>
                        @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <div id="mobileBottom" class="flex flex-col gap-3 justify-center items-center">
                @if (Auth::user())
                    <a href="{{ route('logout') }}" class="pb-10">Cerrar sesión</a>
                @else
                    <a href="/register" class="bg-white text-black font-bold w-fit px-8 py-3 rounded-full">Regístrate</a>
                    <a href="/login" class="pb-6">Inicia Sesión</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="min-h-screen text-white overflow-x-hidden">
        @yield('main')
    </main>

    <footer class="text-white flex justify-center items-center py-4">
        <p>Un proyecto realizado por Raúl Fernández Arce</p>
    </footer>

    <script src="{{ asset('js/base.js') }}"></script>
    @yield('scripts')

</body>
</html>
