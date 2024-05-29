@extends('templates/baseTemplate')
@section('title', 'Mesón Sagrada Familia')
@section('main')
<div id="modalReserva" class="hidden absolute w-screen h-screen bg-black/70 z-50">
    <div id="contentModalReserva" class="m-auto h-4/5 w-4/5 md:w-1/3 bg-white rounded-lg">
        <div id="topModalReserva" class="flex justify-end h-10">
            <i id="closeModalReserva" class="fa-solid fa-xmark cursor-pointer text-3xl p-2 h-fit"></i>
        </div>
        <div id="contentModalReserva" class="">
            aslkjdgfaklsdfjg
        </div>
    </div>
</div>
<div id="contenedorImagenIndex" style="background-image: url({{ asset('img_estaticas/index.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-screen h-screen">
    <div id="contenedorIndex" class="h-full w-full bg-black/50 flex flex-col justify-center items-center text-white gap-3">
        <h1 class="font-bold md:text-5xl text-3xl">Mesón Sagrada Familia</h1>
        <p class="italic md:text-xl">Calle sin nombre, 8</p>
        <div id="abreModalReserva" class="cursor-pointer text-black bg-white rounded-full py-2 px-4 font-bold" onclick="abreModalReserva({{ Auth::user() ? Auth::user()->id : 0 }})">Reserva tu mesa</div>

        <i id="flechaIndex" class="fa-solid fa-arrow-down text-white text-4xl absolute bottom-8 cursor-pointer"></i>
    </div>
</div>
<div id="familia" class="h-screen text-white py-5 px-7 flex flex-col md:flex-row">
    <div id="textoFamilia" class="pe-10">
        <h2 class="md:text-4xl text-3xl font-bold pb-10">Nuestra Familia</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta similique asperiores veniam id corporis! Libero, eos recusandae cupiditate aliquam dolore similique velit fugit? Aut in commodi ab, fugiat libero blanditiis. Culpa at, repellat sapiente assumenda aliquam soluta iure recusandae dicta et corrupti quam! Aliquam enim consequatur tempora ipsum a sunt.
        </p>
        <br>
        <p class="mb-10">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo quos, necessitatibus, voluptatibus exercitationem, eveniet repellat sit est doloribus excepturi illum modi ut quisquam repudiandae officiis. Quod doloremque dolor aspernatur voluptatibus soluta debitis doloribus laboriosam blanditiis temporibus corrupti repudiandae officia, praesentium dignissimos eaque, facilis tempore nobis cum odio. Nemo dicta quasi nobis esse quos hic repudiandae incidunt. Cupiditate error iure assumenda vel nemo placeat ducimus eligendi similique modi odit harum perferendis dolorem voluptatibus voluptates tempora illo laudantium quo, eius sapiente beatae, consequuntur, perspiciatis quibusdam in? Ut sit mollitia dolorum error voluptatem veritatis recusandae ex iste eos necessitatibus voluptate dicta tempora dignissimos eveniet qui ab ratione officiis in rem architecto molestias, reiciendis nemo debitis? Eum veritatis commodi laboriosam nam eveniet ipsam reprehenderit perspiciatis accusantium maxime debitis, repellendus optio sit expedita labore eius iusto unde quidem quis ratione est, facilis nulla nemo amet. Quae adipisci laudantium assumenda repellat, dolores laborum incidunt id quas!
        </p>
        <br>
        <a href="/sobre" class="bg-white font-bold text-lg text-black px-5 py-2 rounded-full ">Conócenos más a fondo</a>
    </div>
    <img src="{{ asset('img_estaticas/plantilla.png') }}" class="md:w-80 md:h-80 mt-20" alt="">

</div>



@endsection
@section('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endsection
