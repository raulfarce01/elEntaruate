@extends('templates/baseTemplate')
@section('title', 'Gestión de Reservas | Mesón Sagrada Familia')
@section('main')
@include('templates/modales/modalReserva')

    <section id="GestionReservasHeader" class="h-60" style="background-image: url({{ asset('img_estaticas/reservado.jpg') }}); backgroud-position: center; background-size: cover; background-repeat: no-repeat; background-origin: border-box; flex flex-col">

        <div id="headerReservas" class="w-full h-full bg-black/50 flex flex-col justify-center items-center">

            <h3 class="text-3xl text-white font-bold pt-20">Gestión de Reservas</h3>

        </div>

    </section>

    <section id="gestionReservasBody" class="flex justify-end items-end px-6 flex-col">

        <div id="abreModalReserva" class="cursor-pointer text-black bg-white rounded-full py-2 px-4 font-bold w-fit mt-3" onclick="abreModalReserva({{ Auth::user() ? Auth::user()->id : 0 }})">Reserva tu mesa</div>

        <table id="reservas" class="w-full my-6">
            <thead>
                <th class="w-fit">Solicitud</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </thead>
            <tbody>

                @foreach ($allReservas as $reserva)

                <tr class="h-10">
                    <td class="text-center w-fit">{{ $reserva['solicitud'] }}</td>
                    <td class="text-center">{{ $reserva['nombre'] }}</td>
                    <td class="text-center">{{ $reserva['telefono'] }}</td>
                    <td class="text-center">{{ $reserva['fecha'] }}</td>
                    <td class="text-center">{{ $reserva['hora'] }}</td>
                    <td class="text-center">
                        <form action="{{ route('reserva_remove', $reserva['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </section>

@endsection
@section('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
