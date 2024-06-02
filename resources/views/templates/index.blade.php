@extends('templates/baseTemplate')
@section('title', 'Mesón Sagrada Familia')
@section('main')
@include('templates/modales/modalReserva')
@if (isset($error))
    <div id="modalError" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black/70 flex-col">
        <div class="text-black bg-white rounded-md py-10 px-8 font-bold">
            <p>{{ $error }}</p>
            <div id="cerrarModalError" class="flex flex-col bg-black rounded-full text-white font-bold py-2 px-4 cursor-pointer mt-7">
                <p class="text-center">Aceptar</p>
            </div>
        </div>

    </div>
@endif
<section id="contenedorImagenIndex" style="background-image: url({{ asset('img_estaticas/index.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-screen">
    <div id="contenedorIndex" class="h-full w-full bg-black/50 flex flex-col justify-center items-center text-white gap-3">
        <h1 class="font-bold md:text-5xl text-3xl">Mesón Sagrada Familia</h1>
        <p class="italic md:text-xl">Calle sin nombre, 8</p>
        <div id="abreModalReserva" class="cursor-pointer text-black bg-white rounded-full py-2 px-4 font-bold" onclick="abreModalReserva({{ Auth::user() ? Auth::user()->id : 0 }})">Reserva tu mesa</div>

        <i id="flechaIndex" class="fa-solid fa-arrow-down text-white text-4xl absolute bottom-8 cursor-pointer"></i>
    </div>
</section>
<section id="familia" class="min-h-screen text-white py-5 md:px-7 ps-5 flex flex-col md:flex-row">
    <div id="textoFamilia" class="pe-10 flex justify-center flex-col">
        <h2 class="md:text-4xl text-4xl font-bold md:pb-10 pb-5">Nuestra Familia</h2>
        <img src="{{ asset('img_estaticas/plantilla.png') }}" class="md:w-80 md:h-80 my-5 md:hidden block m-auto" alt="">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta similique asperiores veniam id corporis! Libero, eos recusandae cupiditate aliquam dolore similique velit fugit? Aut in commodi ab, fugiat libero blanditiis. Culpa at, repellat sapiente assumenda aliquam soluta iure recusandae dicta et corrupti quam! Aliquam enim consequatur tempora ipsum a sunt.
        </p>
        <br>
        <p class="md:mb-10">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo quos, necessitatibus, voluptatibus exercitationem, eveniet repellat sit est doloribus excepturi illum modi ut quisquam repudiandae officiis. Quod doloremque dolor aspernatur voluptatibus soluta debitis doloribus laboriosam blanditiis temporibus corrupti repudiandae officia, praesentium dignissimos eaque, facilis tempore nobis cum odio. Nemo dicta quasi nobis esse quos hic repudiandae incidunt. Cupiditate error iure assumenda vel nemo placeat ducimus eligendi similique modi odit harum perferendis dolorem voluptatibus voluptates tempora illo laudantium quo, eius sapiente beatae, consequuntur, perspiciatis quibusdam in? Ut sit mollitia dolorum error voluptatem veritatis recusandae ex iste eos necessitatibus voluptate dicta tempora dignissimos eveniet qui ab ratione officiis in rem architecto molestias, reiciendis nemo debitis? Eum veritatis commodi laboriosam nam eveniet ipsam reprehenderit perspiciatis accusantium maxime debitis, repellendus optio sit expedita labore eius iusto unde quidem quis ratione est, facilis nulla nemo amet. Quae adipisci laudantium assumenda repellat, dolores laborum incidunt id quas!
        </p>
        <br>
    </div>
    <img src="{{ asset('img_estaticas/plantilla.png') }}" class="md:w-80 md:h-80 mt-20 hidden md:block" alt="">

</section>
<hr class="mx-3">
<section id="platosVendidos" class="text-white py-5 md:px-7 ps-5 flex flex-col pe-5">

    <h2 class="md:text-4xl text-4xl font-bold md:pb-10 pb-5 md:text-center">Nuestras últimas adiciones</h2>

    <div id="platos" class="grid grid-cols-2 md:grid-cols-4 gap-5 pb-4">

    @foreach ($platos as $plato)

        <div id="cardPlato" class="w-full h-full p-2 flex flex-col justify-content-around items-center" style="">
            <div id="imagePlato" class="w-full bg-slate-500 h-48">
                <img class="w-full h-full object-cover" src="{{ asset('/img') ."/". $plato->rutaImagen }}" alt="{{ $plato->nombre }}">
            </div>
            <div id="textoPlato" class="flex w-full flex-col pt-3">
                <h3 class="text-lg font-bold pb-4">{{ $plato->nombre }}</h3>
                <p class="text-left">

                    @foreach ($plato->ingredientes as $ingrediente)

                        {{ $ingrediente->nombre }},

                    @endforeach

                </p>
            </div>
        </div>

    @endforeach

    </div>


</section>

<hr>

<section id="interes" class="flex flex-col text-white py-6 px-3">

    <h2 class="md:text-4xl text-4xl font-bold md:pb-10 pb-5 md:text-center">¿Te gusta lo que has visto?</h2>

    <div id="infoInteres" class="flex flex-col md:flex-row gap-5">

        <div id="cartaInteres" class="h-96 flex flex-col items-center justify-between md:w-1/3" style="background-image: url({{ asset('img_estaticas/localiza.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween">

            <div id="contentInteres" class="h-full w-full flex flex-col justify-between items-center bg-black/50 py-4">
                <h3 class="font-bold text-3xl">Localízanos</h3>
                <p id="direccionInteres" class="italic text-xl">Calle sin nombre, 8</p>
                <a href="https://maps.app.goo.gl/uhUncg125PmzHKKg8" class=" bg-white rounded-full text-black font-bold py-2 px-7">Ver en Google Maps</a>
            </div>

        </div>

        <div id="cartaInteres" class="h-96 flex flex-col items-center justify-between md:w-1/3" style="background-image: url({{ asset('img_estaticas/carta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween">

            <div id="contentInteres" class="h-full w-full flex flex-col justify-between items-center bg-black/50 py-4">
                <h3 class="font-bold text-3xl">¿Quieres ver más?</h3>
                <p id="direccionInteres" class="italic text-xl text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse, eos? Mollitia harum reprehenderit possimus nobis eius perspiciatis? Iste, ratione at.</p>
                <a href="/carta" class=" bg-white rounded-full text-black font-bold py-2 px-7">Ver carta</a>
            </div>

        </div>

        <div id="cartaInteres" class="h-96 flex flex-col items-center justify-between md:w-1/3" style="background-image: url({{ asset('img_estaticas/reserva.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween">

            <div id="contentInteres" class="h-full w-full flex flex-col justify-between items-center bg-black/50 py-4">
                <h3 class="font-bold text-3xl">¿A qué esperas?</h3>
                <p id="direccionInteres" class="italic text-xl">Reserva una mesa con nosotros y disfruta de los deliciosos platos de nuestros cocineros</p>
                <div class=" bg-white rounded-full text-black font-bold py-2 px-7 cursor-pointer" onclick="abreModalReserva({{ Auth::user() ? Auth::user()->id : 0 }})">Reservar</div>
            </div>

        </div>

    </div>

</section>

@endsection
@section('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endsection
