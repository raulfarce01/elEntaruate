@extends('templates/baseTemplate')
@section('title', 'Edit Platos | Mesón Sagrada Familia')
@section('main')

<section id="editPlatoForm" class="pt-24">

    <form action="{{ asset('plato_edit_post/'. $plato->id) }}" id="formEditPlato" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="flex items-center justify-center flex-col-reverse w-full">
            <img class="w-32" src="{{ asset('/img') ."/". $plato['rutaImagen'] }}" alt="{{ $plato['rutaImagen'] }}">
            <input class="block w-fit pe-4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file"
            name="rutaNueva">
            <input type="hidden" name="rutaOld" value="{{ $plato['rutaImagen'] }}">

        </div>

        <div id="nombrePrecio" class="pt-10 flex gap-3">
            <div id="divNombrePlato" class="flex flex-col w-4/5">
                <label for="nombrePlato">Nombre:</label>
                <input type="text" name="nombre" id="nombrePlato" class="border-x-0 border-t-0 bg-transparent" value="{{ $plato->nombre }}">
            </div>
            <div id="divPrecioPlato" class="flex flex-col">
                <label for="precioPlato">Precio:</label>
                <input type="number" name="precio" id="precioPlato" class="border-x-0 border-t-0 bg-transparent" min="0" step=".01" value="{{ $plato->precio }}">
            </div>
        </div>

        <div id="divIngredientesPlato" class="py-8">
            <div id="selectIngredientesPlato" class="flex items-center justify-between px-4">
                <select id="selectIngrediente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected disabled>Selecciona los ingredientes</option>
                  @foreach($allIngredientes as $ingrediente)
                    <option value="{{ $ingrediente->id }}" name="{{ $ingrediente->nombre }}">{{ $ingrediente->nombre }}</option>
                  @endforeach
                </select>
                <i id="addIngredienteList" class="fa-solid fa-plus text-white text-3xl cursor-pointer ps-3"></i>
            </div>
            <div id="muestraIngredientes" class="flex flex-col pt-4">
                @foreach($ingredientesPlato as $ingrediente)
                    <div id="ingredientePlatoOld{{ $ingrediente->id }}" class="flex items-center w-full px-6 mt-4">
                        <input type="text" name="ingredientes[]" class="mb-6 border-x-0 border-t-0 bg-transparent" style="width: 90%" value="{{ $ingrediente->nombre }}">
                        <i id="deleteIngredientePlato{{ $ingrediente->id }}" class="text-center fa-solid fa-trash text-white text-xl cursor-pointer" style="width: 10%" onclick="deleteIngrediente($('#ingredientePlatoOld{{ $ingrediente->id }}'))" ></i>
                    </div>
                @endforeach
                <div id="createInputIngrediente" class="flex ms-4 items-center justify-start bg-white rounded-full text-black w-fit px-4 py-2 cursor-pointer">
                    <p class="text-center">Añadir nuevo ingrediente</p>
                </div>
            </div>
        </div>

        <div id="divSubmitPlato" class="flex justify-end">
            <input type="submit" class="bg-white me-4 text-black px-6 py-2 cursor-pointer w-fitrounded-full mt-6 rounded-full" value="Guardar">
        </div>

    </form>

</section>

@endsection
@section('scripts')
    <script src="{{ asset('js/editPlato.js') }}"></script>
@endsection
