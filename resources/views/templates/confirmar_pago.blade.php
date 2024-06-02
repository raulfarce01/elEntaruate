@extends ('templates/baseTemplate')
@section('title', 'Confirmar Pago | Mesón Sagrada Familia')
@section('main')

<div id="fondo" class="absolute min-h-screen w-full bg-black/70 flex items-center justify-center">

    <div id="modalConfirmarPago" class="bg-white rounded-lg text-black px-4 py-2">

        <div id="volver" class="flex justify-end pb-4">

            <a href="{{ route('pedido_new', $idMesa) }}" class="cursor-pointer text-black bg-white rounded-full py-2 px-4 font-bold"><i class="fa-solid fa-arrow-left text-3xl"></i></a>
        </div>

        <div id="header">

            <h1 class="font-bold md:text-5xl text-3xl pb-3">Confirmar pedido para la mesa {{ $idMesa }}</h1>

        </div>
        <div id="body" class="pb-4">

            @if($platos != null)
                @foreach ($platos as $plato)

                    <li>{{ $plato->nombre }}</li>

                @endforeach
            @endif

            @if($nombresCupones != null)

                @foreach ($nombresCupones as $nombreCupon)

                    <li>{{ $nombreCupon }}</li>

                @endforeach

            @endif

        </div>
        <div id="footer">
            <form action="{{ asset('add_pedido')}}" method="POST" class="flex pt-4 justify-end items-center">

                @csrf

                <input type="hidden" name="idMesa" value="{{ $idMesa }}">
                @if($platos != null)
                    @foreach ($platos as $plato)

                        <input type="hidden" name="platos[]" value="{{ $plato->id }}">

                    @endforeach
                @endif

                @if($idCupones != null)
                    @foreach ($idCupones as $cupon)

                        <input type="hidden" name="platos[]" value="{{ $cupon }}">

                    @endforeach
                @endif


                <div id="footerForm" class="flex justify-between w-full items-center">

                    <p class="font-bold">Total: ${{ $precioTotal }}</p>

                    <input type="submit" value="Confirmar Pago" class="bg-black text-white px-4 py-2 rounded-full cursor-pointer">

                </div>

            </form>
        </div>

    </div>

</div>

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-screen">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">

        <h1 class="font-bold md:text-5xl text-3xl">Confirmar pedido en mesa {{ $idMesa }}</h1>

    </div>
</section>

@endsection
