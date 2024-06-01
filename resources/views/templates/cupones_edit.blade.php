@extends('templates/baseTemplate')
@section('title', 'Edit Cupones | Mesón Sagrada Familia')
@section('main')

<section id="headerCuponesSection" class="h-60" style="background-image: url({{ asset('img_estaticas/reservado.jpg') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col">

    <div id="headerCuponesDiv" class="w-full h-full bg-black/50 flex flex-col justify-center items-center">

        <h3 class="text-3xl text-white font-bold pt-20">Editar Cupón</h3>

    </div>

</section>

<section id="editCuponBody" class="py-2 px-6">

    <form action="/edit_cupon_post/{{ $cupon->id }}" method="post" class="px-6 text-white">
        @csrf

        <div id="nombrePrecio" class="pt-10 flex flex-col gap-3">
            <div id="divNombrePlato" class="flex flex-col w-full">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="border-x-0 border-t-0 bg-transparent" value="{{ $cupon->name }}">
            </div>

            <div id="divNombrePlato" class="flex flex-col w-full">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" class="border-x-0 border-t-0 bg-transparent" value="{{ $cupon->descripcion }}">
            </div>

        </div>

        <div id="divPlatos" class="py-3 pt-8">
            <h3 class="pb-3">Platos:</h3>
            <div id="selectPlatos" class="flex items-center justify-between">
                <select id="selectPlato" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected disabled>Selecciona los platos</option>
                  @foreach($allPlatos as $plato)
                    <option value="{{ $plato->id }}" name="{{ $plato->nombre }}">{{ $plato->nombre }}</option>
                  @endforeach
                </select>
                <i id="addPlatoList" class="fa-solid fa-plus text-white text-3xl cursor-pointer ps-3"></i>
            </div>
            <div id="muestraPlato" class="flex flex-col pt-4">
                @foreach ($cupon->platos as $plato)

                    <div id="div{{ $plato->id }}" class="flex items-center w-full" style="background-color: {{ $plato->color }}">
                        <input type="text" name="platos[]" id="plato{{ $plato->id }}" class="border-x-0 border-t-0 mb-6 bg-transparent" style="width:90%" value="{{ $plato->nombre }}">
                        <i class="fa-solid fa-trash cursor-pointer" id="trashIcon0" aria-hidden="true" style="width: 10%; text-align: center;" onclick="borrarPlato({{ $plato->id }})"></i>
                    </div>

                @endforeach
            </div>
        </div>

        <div id="caducidadPorcentaje" class="flex justify-between gap-2 mt-4">
            @php
                $date = new DateTime($cupon->caducidad);

                $fechaCaducidad = $date->format('Y-m-d');
            @endphp
            <div id="divCaducidad" class="w-1/3">
                <label for="caducidad">Caducidad:</label>
                <input type="date" name="caducidad" id="caducidad" class="border-x-0 border-t-0 bg-transparent" value="{{ $fechaCaducidad }}">

            </div>

            <div id="divPrecio" class="w-1/3 flex flex-col">
                <label for="porcentaje">Porcentaje:</label>
                <input type="number" name="porcentaje" id="porcentaje" class="border-x-0 border-t-0 bg-transparent" min="0" max="100" value="{{ $cupon->porcentaje }}">
            </div>
        </div>

        <div id="divSubmitPlato" class="flex justify-end">
            <input type="submit" class="bg-white text-black font-bold px-6 py-2 cursor-pointer w-fitrounded-full mt-6 rounded-full" value="Añadir">
        </div>
    </form>


</section>
@endsection
@section('scripts')
    <script src="{{ asset('js/edit_cupon.js') }}"></script>
@endsection
