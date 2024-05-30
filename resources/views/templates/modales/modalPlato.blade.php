<div id="modalPlato" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black/70">

    <div id="contentPlato" class="text-black bg-white rounded-md py-10 px-8 font-bold w-2/3">

        <div id="topModalPlato" class="flex justify-end h-10">
            <i id="closeModalPlato" class="fa-solid fa-xmark cursor-pointer text-3xl p-2 h-fit"></i>
        </div>

        <div id="contentModalPlato">

            <h3 id="nombrePlato" class="text-3xl font-bold text-center py-4">Añadir Plato</h3>
            <form action="/add_plato" method="post">
                @csrf

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparent dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-800 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Haz click aqui</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG</p>
                        </div>
                        <input id="dropzone-file" type="file" name="ruta" class="hidden" />
                    </label>
                </div>

                <div id="divNombrePlato" class="flex flex-col pt-10">
                    <label for="nombrePlato">Nombre:</label>
                    <input type="text" name="nombre" id="nombrePlato" class="border-x-0 border-t-0 bg-transparent">
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
