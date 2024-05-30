@extends('templates/baseTemplate')
@section('title', 'Gestión de Platos | Mesón Sagrada Familia')
@section('main')
@include('templates/modales/modalPlato')

<section id="portada" style="background-image: url({{ asset('img_estaticas/portadaCarta.png') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col justifybetween" class="w-full h-96">
    <div id="contenedorPortada" class="h-full w-full bg-black/30 flex flex-col justify-center items-center text-white gap-3 pt-32">
        <h1 class="font-bold md:text-5xl text-3xl">Gestión de Platos</h1>
    </div>
</section>

<section id="platos" class="grid grid-cols-2 md:grid-cols-4 gap-5">

    <div id="topPlatos" class="w-full h-full md:col-span-4 col-span-2 py-5 px-6 flex justify-end items-center">
        <div id="abrirModalPlato" class="cursor-pointer text-black bg-white rounded-full py-2 px-6 font-bold w-fit">Añadir Plato</div>
    </div>

</section>

@endsection
@section('scripts')
    <script src="{{ asset('js/platosGestion.js') }}"></script>
@endsection
