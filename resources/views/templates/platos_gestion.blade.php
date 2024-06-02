@extends('templates/baseTemplate')
@section('title', 'Gestión de Platos | Mesón Sagrada Familia')
@section('main')
@include('templates/modales/modalPlato')

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-96">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">
        <h1 class="font-bold md:text-5xl text-3xl">Gestión de Platos</h1>
    </div>
</section>

<section id="platos" class="">

    <div id="topPlatos" class="w-full h-full md:col-span-4 col-span-2 py-5 px-6 flex justify-end items-center">
        <div id="abrirModalPlato" class="cursor-pointer text-black bg-white rounded-full py-2 px-6 font-bold w-fit">Añadir Plato</div>
    </div>

    <table id="platosTable" class="w-full">
        <thead>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($allPlatos as $plato)
            <tr class="">
                <td class="text-center">{{ $plato['id'] }}</td>
                <td class="text-center flex items-center justify-center"><img class="w-32" src="{{ asset('/img') ."/". $plato['rutaImagen'] }}" alt="{{ $plato['rutaImagen'] }}"></td>
                <td class="text-center">{{ $plato['nombre'] }}</td>
                <td class="text-center">{{ $plato['precio'] }}</td>
                <td class="text-center">
                    <form action="{{ route('platos_edit', $plato['id']) }}" method="GET" class="inline w-fit me-1">
                        @csrf
                        <button type="submit" class="text-yellow-500"><i class="fa-solid text-yellow-500 fa-gear"></i></button>
                    </form>
                    <form action="{{ route('plato_remove', $plato['id']) }}" method="POST" class="inline w-fit">
                        @csrf
                        <button type="submit" class="text-red-500"><i class="fa-solid text-red-500 fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

@endsection
@section('scripts')
    <script src="{{ asset('js/platosGestion.js') }}"></script>
@endsection
