@extends('templates/baseTemplate')
@section('title', 'Registrarse')
@section('main')
<x-guest-layout>
        <div class="flex flex-col justify-center items-center w-screen">
            <img src="{{ asset('img_estaticas/logo.png') }}" class="w-60 pt-14" alt="Mesón Sagrada Familia">
        </div>

        <x-validation-errors class="mb-4 md:w-96" />

        <div id="formContainer" class="flex justify-center items-center">
            <form method="POST" action="{{ route('register') }}" class="md:w-96 text-white">
                @csrf

                <div id="nombreApellidos" class="flex">
                    <div class="w-1/3 pe-2">
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="w-2/3">
                        <x-label for="surnames" value="{{ __('Apellidos') }}" />
                        <x-input id="surnames" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="surnames" :value="old('surnames')" required autofocus autocomplete="surnames" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-label for="telefono" value="{{ __('Teléfono') }}" />
                    <x-input id="telefono" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div id="passwords" class="flex mt-4">
                    <div class="w-1/2 pe-1">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="w-1/2 ps-1">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full border-x-0 border-t-0 bg-transparent rounded-0" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>


                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('Acepto los términos y condiciones', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-300 hover:text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Iniciar Sesión') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Registrarse') }}
                    </x-button>
                </div>
            </form>
        </div>

</x-guest-layout>
@endsection
