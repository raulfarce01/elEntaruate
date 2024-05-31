@extends('templates/baseTemplate')
@section('title', 'Mis Favoritos | Mesón Sagrada Familia')
@section('main')

<section id="listaFavoritos" class="grid grid-cols-2 md:grid-cols-4 gap-5 py-6 pb-12 px-4 pt-24">

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
            <div id="precio" class="font-bold">{{ $plato->precio }}€/ración</div>
            <form action="/remove_favorito_user/{{ $plato->id }}" method="POST">
                @csrf
                <button type="submit">
                    <i id="addFavorito" class="fa-solid text-white cursor-pointer fa-heart text-2xl"></i>
                </button>
            </form>
        </div>

    </div>

@endforeach

</section>

@endsection
