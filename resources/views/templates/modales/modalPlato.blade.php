<div id="modalPlato" class="absolute top-0 left-0 w-full h-full overflow-auto flex justify-center items-center bg-black/70 hidden z-50">

    <div id="contentPlato" class="text-black bg-white rounded-md py-10 px-8 font-bold w-2/3 overflow-auto">

        <div id="topModalPlato" class="flex justify-end h-10">
            <i id="closeModalPlato" class="fa-solid fa-xmark cursor-pointer text-3xl p-2 h-fit"></i>
        </div>

        <div id="contentModalPlato">

            <h3 id="nombrePlato" class="text-3xl font-bold text-center py-4">Añadir Plato</h3>
            <form action="/add_plato" method="post" enctype="multipart/form-data">
                @csrf

                <div class="flex items-center justify-center w-full">
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file"
                    name="ruta">

                </div>

                <div id="nombrePrecio" class="pt-10 flex gap-3">
                    <div id="divNombrePlato" class="flex flex-col w-4/5">
                        <label for="nombrePlato">Nombre:</label>
                        <input type="text" name="nombre" id="nombrePlato" class="border-x-0 border-t-0 bg-transparent">
                    </div>
                    <div id="divPrecioPlato" class="flex flex-col">
                        <label for="precioPlato">Precio:</label>
                        <input type="number" name="precio" id="precioPlato" class="border-x-0 border-t-0 bg-transparent" min="0" value="0" step=".01">
                    </div>
                </div>

                <div id="divIngredientesPlato" class="py-8">
                    <div id="selectIngredientesPlato" class="flex items-center justify-between">
                        <select id="selectIngrediente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected disabled>Selecciona los ingredientes</option>
                          @foreach($allIngredientes as $ingrediente)
                            <option value="{{ $ingrediente->id }}" name="{{ $ingrediente->nombre }}">{{ $ingrediente->nombre }}</option>
                          @endforeach
                        </select>
                        <i id="addIngredienteList" class="fa-solid fa-plus text-black text-3xl cursor-pointer ps-3"></i>
                    </div>
                    <div id="muestraIngredientes" class="flex flex-col pt-4">
                        <div id="createInputIngrediente" class="flex items-center justify-start bg-black rounded-full text-white w-fit px-4 py-2 cursor-pointer">
                            <p class="text-center">Añadir nuevo ingrediente</p>
                        </div>
                    </div>
                </div>

                <div id="divSubmitPlato" class="flex justify-end">
                    <input type="submit" class="bg-black text-white px-6 py-2 cursor-pointer w-fitrounded-full mt-6 rounded-full" value="Añadir">
                </div>
            </form>

        </div>

    </div>

</div>
