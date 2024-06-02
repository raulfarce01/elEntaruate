@extends('templates/baseTemplate')
@section('title', 'Cupones | Mesón Sagrada Familia')
@section('main')
@include('templates/modales/modalCupon')

<section id="headerCuponesSection" class="h-60" style="background-image: url({{ asset('img_estaticas/reservado.jpg') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col">

    <div id="headerCuponesDiv" class="w-full h-full bg-black/50 flex flex-col justify-center items-center">

        <h3 class="text-3xl text-white font-bold pt-20">Cupones</h3>

    </div>

</section>

<section id="bodyCupones" class="w-full grid grid-cols-2 md:grid-cols-4 gap-2 py-6 pb-14 px-4">

    @if (Auth::user() && Auth::user()->currentTeam->name == 'Admin')
    <div id="headerBodyCupones" class="w-full flex pb-6 justify-end col-span-2 md:col-span-4">
        <div id="abreModalCupon" class="bg-white rounded-full text-black font-bold py-2 px-4 cursor-pointer">
            Crear cupón
        </div>
    </div>
    @endif

    @if (isset($allCupones) && count($allCupones) > 0)

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
                        <div id="precio" class="font-bold">Total: {{ $precioFinal }}€</div>
                    </div>
                    @if (Auth::user() && Auth::user()->currentTeam->name == 'Admin')

                        <div id="adminButtons" class="flex justify-between">

                            <div id="estadoCupon" class="text-white">

                                Estado {{ $cupon->activo == true ? 'Activo' : 'Inactivo' }}

                            </div>

                            <div id="buttonCupones" class="flex">
                                <a href="{{ route('cupon_edit', $cupon->id) }}">
                                    <i class="fa-solid fa-pen-to-square text-white py-2 px-4 cursor-pointer"></i>
                                </a>
                                <form action="{{ route('cupon_remove', $cupon->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center">
                                        <i class="fa-solid fa-trash text-white py-2 px-2 cursor-pointer"></i>
                                    </button>
                                </form>

                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        @endforeach

    @endif

</section>

@endsection
@section('scripts')
    <script src="{{ asset('js/cupon.js') }}"></script>
@endsection
