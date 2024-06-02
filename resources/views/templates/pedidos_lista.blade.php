@extends('templates/baseTemplate')
@section('title', 'Lista Pedidos | Mesón Sagrada Familia')
@section('main')

@php
    $totalRes = 0;
@endphp

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-96">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">

        <h1 class="font-bold md:text-5xl text-3xl pt-6">Mis Pedidos</h1>

    </div>
</section>

<section id="pedidos" class="py-3 px-6">
    @if($pedidos != null)

    @foreach ($pedidos as $pedido)

    <div id="pedidoContainerBig" class="grid grid-cols-2 md:grid-cols-4 gap-5">

        @foreach ($pedido as $plato)

        @php
            $totalRes++;
        @endphp

        <div id="containerPedido">

            <div id="platoCarta">
                <div id="headerCarta">
                    <div id="imgPlato" class="" style="height:250px">
                        <img class="w-full h-full object-cover" src="{{ asset('/img') ."/". $plato['rutaImagen'] }}" alt="{{ $plato['nombre'] }}">
                    </div>

                    <div id="contentPlato" class="flex flex-col justify-between">
                        <div id="nombrePlato">
                            <h3 class="font-bold text-xl text-center py-2">{{ $plato['nombre'] }}</h3>
                        </div>
                    </div>
                </div>

                <div id="footerCarta" class="pt-6 flex justify-between">
                    <div id="precio" class="font-bold flex items-center">{{ $plato['precio'] }}€/ración</div>

                    @if (Auth::user()->currentTeam->name == 'Admin')
                        <form action="/finalizar_plato/{{ $plato['platoPedidoId'] }}" method="post">
                            @csrf
                            <button type="submit" class="bg-white text-black font-bold text-center py-2 px-4 rounded">
                                Finalizar
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
        @endforeach

    </div>

    <div id="separador" class="py-4"></div>
    <hr>
    <div id="separador" class="py-4"></div>

    @endforeach

    <div id="paginas" class="w-full flex justify-between">

        <a href="/pedidos/{{ $pagina - 1 }}" class="{{ $pagina == 1 ? 'hidden' : '' }} {{ Auth::user()->currentTeam->name == 'Admin' ? 'hidden' : '' }} bg-white text-black font-bold text-center py-2 px-4 rounded">Página anterior</a>
        <a href="/pedidos/{{ $pagina + 1 }}" class="{{ $totalRes < 10 ? 'hidden' : '' }} {{ Auth::user()->currentTeam->name == 'Admin' ? 'hidden' : '' }} bg-white text-black font-bold text-center py-2 px-4 rounded">Página Siguiente</a>

    </div>

    @endif


</section>

@endsection
