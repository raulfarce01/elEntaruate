@extends('templates/baseTemplate')
@section('title', 'Carta | Mesón Sagrada Familia')
@section('main')

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-96">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">
        @if (isset($idMesa))

            <h1 class="font-bold md:text-5xl text-3xl">Pedido para la mesa: {{ $idMesa }}</h1>

        @else

            <h1 class="font-bold md:text-5xl text-3xl">Nuestra Carta</h1>

        @endif

    </div>
</section>

@if (isset($idMesa))

    <form action="{{ route('confirmar_pago') }}" method="GET" id="listaPlatosPedido" class="flex justify-end px-10 mt-4">
        @csrf
        <input type="submit" class="px-6 py-2 bg-white text-black rounded-full font-bold cursor-pointer" value="Realizar pedido">
        <input type="hidden" name="idMesa" value="{{ $idMesa }}">
    </form>

@endif

@if (isset($idMesa))

@if (count($favoritos) > 0)

<section id="favoritos" class="grid grid-cols-2 md:grid-cols-4 gap-5 py-6 pb-12 px-4">

    <h3 class="col-span-2 md:col-span-4 font-bold text-2xl">Mis favoritos</h3>

    @foreach ($favoritos as $plato)

    <div id="cartaPlato" class="flex flex-col justify-between w-full" style="height: 400px">

        <div id="headerCarta">
            <div id="imgPlato" class="" style="height:250px">
                <img class="w-full h-full object-cover" src="{{ asset('/img') ."/". $plato->rutaImagen }}" alt="{{ $plato->nombre }}">
            </div>

            <div id="contentPlato" class="flex flex-col justify-between">
                <div id="nombrePlato">
                    <h3 class="font-bold text-xl text-center py-2">{{ $plato->nombre }}</h3>
                </div>
                <div id="ingredientesPlato">
                    <p>
                    @for ($i = 0; $i < count($plato->ingredientes); $i++)
                        @if (!empty($plato->ingredientes[$i]))
                            {{ $plato->ingredientes[$i]->nombre }},
                        @endif
                    @endfor
                    </p>
                </div>
            </div>
        </div>
        <div id="footerCarta" class="pt-6 flex justify-between">
            <div id="precio" class="font-bold flex items-center">{{ $plato->precio }}€/ración</div>
            <div id="contentContadorPedido">
                <div id="addPlatoPedido{{ $plato->id }}" class="px-6 py-2 bg-white text-black rounded-full font-bold cursor-pointer" onclick="añadePlatoPedido({{ $plato->id }})">
                    <p>Añadir al pedido</p>
                </div>
                <div id="containerContador{{ $plato->id }}" class="relative flex items-center max-w-[8rem] hidden">
                    <button type="button" id="restaContador{{ $plato->id }}" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" id="cantidadPlato{{ $plato->id }}" name="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1" required />
                    <button type="button" id="sumaContador{{ $plato->id }}" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>

@endforeach

</section>

@endif

@if (count($allCupones) > 0)

<section id="cuponesDescuento" class="grid grid-cols-2 md:grid-cols-4 gap-5 py-6 pb-12 px-4">

    <h3 class="col-span-2 md:col-span-4 font-bold text-2xl">Cupones activos</h3>

    @foreach ($allCupones as $cupon)

    <div id="cartaPlato" class="flex flex-col justify-between w-full" style="height: 400px">

        <div id="headerCarta">
            @if (isset($cupon->platos->first()->rutaImagen))
                <div id="imgPlato" class="" style="height:250px">
                    <img class="w-full h-full object-cover" src="{{ asset('/img') ."/". $cupon->platos->first()->rutaImagen }}" alt="{{ $cupon->platos->first()->nombre }}">
                </div>
            @endif

            <div id="contentCupon" class="flex flex-col justify-between">
                <div id="nombreCupon">
                    <h3 class="font-bold text-xl text-center py-2 text-white">{{ $cupon->name }}</h3>
                </div>
                <div id="descripcionCupon">
                    <p>{{ $cupon->descripcion }}</p>
                </div>
                <div id="footerCupon" class="flex justify-between py-2">
                    <div id="descuento" class="font-bold">{{ $cupon->porcentaje }}% de descuento</div>
                    @php

                        $sumaPrecios = 0;

                        foreach ($cupon->platos as $plato) {

                            $sumaPrecios += $plato->precio;

                        }

                        $precioDescuento = ($cupon->porcentaje / 100) * $sumaPrecios;
                        $precioFinal = $sumaPrecios - $precioDescuento;

                    @endphp
                    <div id="precio" class="font-bold flex items-center">Total: {{ $precioFinal }}€</div>
                </div>
                <div class="flex justify-end">
                    <div id="addCuponPedido{{ $cupon->id }}" class="px-6 py-2 w-fit bg-white text-black rounded-full font-bold cursor-pointer" onclick="añadeCuponPedido({{ $cupon->id }})">
                        <p id="parrafoCupon{{ $cupon->id }}">Añadir al pedido</p>
                    </div>

                </div>

            </div>
        </div>

    </div>

    @endforeach
</section>

@endif

@endif

<section id="platos" class="grid grid-cols-2 md:grid-cols-4 gap-5 py-6 pb-12 px-4 mt-4">

    @php
        $esFavorito = false;
    @endphp

    @if (isset($idMesa))

        <h3 class="col-span-2 md:col-span-4 font-bold text-2xl">Platos de la carta</h3>

    @endif

    @foreach ($allPlatos as $plato)

        @if (isset($idMesa))

            @foreach ($favoritos as $favorito)

                @php
                    if($plato->id == $favorito->platoId){

                        $esFavorito = true;

                    }
                @endphp

            @endforeach

        @endif

        @if ($esFavorito == false)

            <div id="cartaPlato" class="flex flex-col justify-between w-full mb-10" style="height: 400px">

                <div id="headerCarta">
                    <div id="imgPlato" class="" style="height:250px">
                        <img class="w-full h-full object-cover" src="{{ asset('/img') ."/". $plato->rutaImagen }}" alt="{{ $plato->nombre }}">
                    </div>

                    <div id="contentPlato" class="flex flex-col justify-between">
                        <div id="nombrePlato">
                            <h3 class="font-bold text-xl text-center py-2">{{ $plato->nombre }}</h3>
                        </div>
                        <div id="ingredientesPlato">
                            <p>
                            @for ($i = 0; $i < count($plato->ingredientes); $i++)
                                @if (!empty($plato->ingredientes[$i]))
                                    {{ $plato->ingredientes[$i]->nombre }},
                                @endif
                            @endfor
                            </p>
                        </div>
                    </div>
                </div>



                <div id="footerCarta" class="pt-6 flex justify-between">
                    <div id="precio" class="font-bold flex items-center">{{ $plato->precio }}€/ración</div>
                    @if (isset($idMesa))
                        <div id="addPlatoPedidoPlato{{ $plato->id }}" class="px-6 py-2 bg-white text-black rounded-full font-bold cursor-pointer" onclick="addPlatoPedidoPlato({{ $plato->id }})">
                            <p>Añadir al pedido</p>
                        </div>
                        <div id="containerContadorPlato{{ $plato->id }}" class="relative flex items-center max-w-[8rem] hidden">
                            <button type="button" id="restaContadorPlato{{ $plato->id }}" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <input type="text" id="cantidadPlatoPlato{{ $plato->id }}" name="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1" required />
                            <button type="button" id="sumaContadorPlato{{ $plato->id }}" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                    @else
                        @if (Auth::user())
                            @if ($favoritos->contains('platoId', $plato->id))
                            <form action="/remove_favorito/{{ $favoritos->where('platoId', $plato->id)->first()->id }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <i id="addFavorito" class="fa-solid text-white cursor-pointer fa-heart text-2xl"></i>
                                </button>
                            </form>
                            @else
                            <form action="/add_favorito/{{ $plato->id }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <i id="addFavorito" class="fa-regular text-white cursor-pointer fa-heart text-2xl"></i>
                                </button>
                            </form>
                            @endif
                        @endif
                    @endif
                </div>

            </div>

        @endif

        @php

            $esFavorito = false;

        @endphp

    @endforeach

</section>

@endsection
@section('scripts')

    <script src="{{ asset('js/pedido.js') }}"></script>

@endsection
