@extends('templates/baseTemplate')
@section('title', 'Iniciar Sesión')
@section('main')

<x-guest-layout>
        <div id="logoLogin" class=" flex items-center justify-center pt-20">
            <img id="logoImg" class="w-60" src="{{ asset('img_estaticas/logo.png') }}" class="relative z-40" alt="Mesón Sagrada Familia">
        </div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="text-white px-5 flex flex-col items-center justify-center">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0 md:w-96" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0 md:w-96" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 md:w-96">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Recordar contraseña') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
</x-guest-layout>
@endsection
