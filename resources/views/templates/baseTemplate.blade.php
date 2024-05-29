<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/161f7db9b3.js" crossorigin="anonymous"></script>
</head>
<body class="min-w-full bg-stone-950">
    <nav class="flex items-center justify-between pr-8 w-full z-30 bg-zinc-500/5 text-white absolute top-0">
        <div id="headerLeft" class="flex items-center justify-between">
            <div id="logo" class="w-20">
                <a href="/">
                    <img src="{{ asset('img_estaticas/logo.png') }}" class="relative z-40" alt="Mesón Sagrada Familia">
                    <div id="fondoImagen" class="bg-gray-400 rounded-full w-10 h-10 absolute top-5 left-5 z-30"></div>
                </a>
            </div>
            <div id="navButtons" class="md:flex md:gap-6 hidden">
                <a href="/">Inicio</a>
                <a href="/carta">Carta</a>
                <a href="/contacto">Contacto</a>
                <a href="/sobre">¿Quiénes somos?</a>
            </div>
        </div>


        <div id="profileLogin" class="md:flex lg:gap-6 hidden">
            @if (Auth::user())
                <p id="userHeader" class="cursor-pointer">Hola, {{ Auth::user()->name }} <i id="" class="fa-solid fa-angle-down"></i></p>
                <div id="desplegableUser" class="absolute z-50 bg-black text-white rounded-md px-6 py-4 flex flex-col gap-4 justify-around items-center w-60 right-6 top-14 hidden">
                    <a href="/pedidos">Mis Pedidos</a>
                    <a href="/user/{{ Auth::user()->id }}">Mi Perfil</a>
                    <a href="/user/{{ Auth::user()->id }}/favoritos">Mis Favoritos</a>
                    <a href="/user/{{ Auth::user()->id }}/reservas">Mis Reservas</a>
                    <a href="/logout">Cerrar sesión</a>
                </div>
            @else
                <a href="/register">Regístrate</a>
                <a href="/login">Inicia Sesión</a>
            @endif
        </div>

        <div id="hamburguesa" class="md:hidden">
            <svg class="block h-6 w-6 fill-current cursor-pointer" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </div>
        <div id="menuMobile" class="hidden absolute z-50 top-0 h-screen w-screen bg-black text-white flex flex-col justify-between">
            <div id="mobileTop" class="ps-3">
                <div id="topBack" class="flex justify-between items-center pb-4">
                    @if (Auth::user())
                        <p id="userHeader" class="pt-6 font-bold">Hola, {{ Auth::user()->name }}</p>
                    @endif
                    <i id="mobileBack" class="fa-solid fa-arrow-left text-white p-6 text-2xl cursor-pointer"></i>
                </div>

                <div id="mobileEnlaces" class="flex flex-col gap-6">
                    <a href="/">Inicio</a>
                    <a href="/carta">Carta</a>
                    <a href="/contacto">Contacto</a>
                    <a href="/sobre">¿Quiénes somos?</a>
                    @if (Auth::user())
                        <a href="/pedidos">Mis Pedidos</a>
                        <a href="/user/{{ Auth::user()->id }}">Mi Perfil</a>
                        <a href="/user/{{ Auth::user()->id }}/favoritos">Mis Favoritos</a>
                        <a href="/user/{{ Auth::user()->id }}/reservas">Mis Reservas</a>
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

    <main>
        @yield('main')
    </main>

    <script src="{{ asset('js/base.js') }}"></script>
    @yield('scripts')

</body>
</html>
