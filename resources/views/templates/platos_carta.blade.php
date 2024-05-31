@extends('templates/baseTemplate')
@section('title', 'Carta | Mesón Sagrada Familia')
@section('main')

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-96">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">
        <h1 class="font-bold md:text-5xl text-3xl">Nuestra Carta</h1>
    </div>
</section>

<section id="platos" class="grid grid-cols-2 md:grid-cols-4 gap-5 py-6 pb-12 px-4">

    @foreach ($allPlatos as $plato)

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
                <div id="precio" class="font-bold">{{ $plato->precio }}€/ración</div>
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
            </div>

        </div>

    @endforeach

</section>

@endsection
