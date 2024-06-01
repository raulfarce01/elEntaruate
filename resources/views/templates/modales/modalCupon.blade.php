<div id="modalCupon" class="absolute top-0 left-0 w-full h-full overflow-auto flex justify-center items-center bg-black/70 hidden z-50">

    <div id="contentPlato" class="text-black bg-white rounded-md py-10 px-8 font-bold w-2/3 overflow-auto">

        <div id="topModalPlato" class="flex justify-end h-10">
            <i id="cerrarModalCupon" class="fa-solid fa-xmark cursor-pointer text-3xl p-2 h-fit"></i>
        </div>

        <div id="contentModalPlato">

            <h3 id="nombrePlato" class="text-3xl font-bold text-center py-4">Crear cupón</h3>
            <form action="/add_cupon" method="post" class="px-6">
                @csrf

                <div id="nombrePrecio" class="pt-10 flex flex-col gap-3">
                    <div id="divNombrePlato" class="flex flex-col w-full">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="border-x-0 border-t-0 bg-transparent">
                    </div>

                    <div id="divNombrePlato" class="flex flex-col w-full">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="border-x-0 border-t-0 bg-transparent">
                    </div>

                </div>

                <div id="caducidadPorcentaje" class="flex justify-between gap-2 mt-4">
                    <div id="divCaducidad" class="w-1/3">
                        <label for="caducidad">Caducidad:</label>
                        <input type="date" name="caducidad" id="caducidad" class="border-x-0 border-t-0 bg-transparent">
                    </div>

                    <div id="divPrecio" class="w-1/3">
                        <label for="porcentaje">Porcentaje:</label>
                        <input type="number" name="porcentaje" id="porcentaje" class="border-x-0 border-t-0 bg-transparent" min="0" max="100">
                    </div>
                </div>

                <div id="divSubmitPlato" class="flex justify-end">
                    <input type="submit" class="bg-black text-white px-6 py-2 cursor-pointer w-fitrounded-full mt-6 rounded-full" value="Añadir">
                </div>
            </form>

        </div>

    </div>

</div>
