<div id="modalReserva" class="hidden fixed w-full h-screen bg-black/70 z-50 text-black">
    <div id="contentModalReserva" class="m-auto h-4/5 w-4/5 md:w-1/3 bg-white rounded-lg">
        <div id="topModalReserva" class="flex justify-end h-10">
            <i id="closeModalReserva" class="fa-solid fa-xmark cursor-pointer text-3xl p-2 h-fit"></i>
        </div>
        <div id="contentModalReserva" class="">
            <form action="{{ route('reserva_add') }}" method="post" class="px-6">

                <h2 class="text-center text-2xl font-bold">Reservas</h2>

                @csrf
                <div id="modalContainer" class="flex flex-col ">
                    <label for="user">Nombre: </label>
                    <input type="text" name="user" id="user" placeholder="Escribe el nombre de la reserva...">
                    <div id="fechaHora" class="flex gap-3">
                        <div id="fechaDiv" class="flex flex-col">
                            <label for="fecha">Fecha: </label>
                            <input type="date" name="fecha" id="fecha" placeholder="Put the title here...">
                        </div>
                        <div id="horaDiv" class="flex flex-col">
                            <label for="hora">Hora: </label>
                            <input type="time" name="hora" id="hora" placeholder="Put the title here...">
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-black text-white px-6 py-2 rounded-full mt-6 w-full">Solicitar Reserva</button>

                <p class="italic mt-4">Guardaremos su reserva durante 15 minutos. Si a los 15 minutos de la hora de la reserva aún no ha llegado, cancelaremos la reserva en caso de necesitar su mesa</p>


            </form>
        </div>
    </div>
</div>
