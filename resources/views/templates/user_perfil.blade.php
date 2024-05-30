@extends('templates/baseTemplate')
@section('title', 'Mi Perfil | Mesón Sagrada Familia')
@section('main')

<div class="flex flex-col justify-center items-center w-screen">
    <img src="{{ asset('img_estaticas/logo.png') }}" class="w-60 pt-14" alt="Mesón Sagrada Familia">
</div>

<div id="formContainer" class="flex justify-center items-center flex-col">

    <div id="errors" class="md:w-96 pb-7">
        @if (isset($error) && $error != null)
            <p class="text-red-500 text-xs italic">{{ $error }}</p>
        @endif
    </div>

    <form method="POST" action="{{ route('user_update') }}" class="md:w-96 text-white">
        @csrf

        <input type="hidden" name="updateUser" value="true">

        <div id="nombreApellidos" class="flex">
            <div class="w-1/3 pe-2">
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="name" value="{{ $user->name }}" required autofocus disabled />
            </div>

            <div class="w-2/3">
                <x-label for="surnames" value="{{ __('Apellidos') }}" />
                <x-input id="surnames" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="surnames" value="{{ $user->surnames }}" required autofocus disabled />
            </div>
        </div>

        <div class="mt-4">
            <x-label for="telefono" value="{{ __('Teléfono') }}" />
            <input id="telefono" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="telefono" value="{{ $user->telefono }}" required autocomplete="telefono" />
        </div>

        <div class="mt-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <input id="email" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
        </div>

        <div id="passwords" class="flex mt-4">
            <div class="w-1/2 pe-1">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <input id="password" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="w-1/2 ps-1">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <input id="password_confirmation" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>

        <div id="containerButton" class="flex justify-end items-center">
            <x-button class="ms-4 mt-6">
                {{ __('Guardar') }}
            </x-button>
        </div>
    </form>
</div>

@endsection
