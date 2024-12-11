@extends('layouts.main')

@section('title', 'Réinitialisation du mot de passe')

@section('content')
    <div class="container">
        <div class="">
            <h1 class="mt-10 text-center text-3xl">
                Réinitialisation du mot de passe
            </h1>
        </div>

        <div class="mt-8 mx-32">
            <div class="mb-4 text-sm text-gray-600 text-center">
                Veuillez entrer votre adresse e-mail et votre nouveau mot de passe.
            </div>

            <form class="space-y-6" method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group mt-2">
                    <label for="email" class="absolute white mb-2 ml-4 px-3">Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autocomplete="email" class="register-input">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password" class="absolute white mb-2 ml-4 px-3">Nouveau mot de passe</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" class="register-input">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password_confirmation" class="absolute white mb-2 ml-4 px-3">Confirmer le mot de passe</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="register-input">
                </div>

                <div class="flex justify-center items-center py-5">
                    <button type="submit" class="button-color border-2 px-6 py-2">
                        Réinitialiser le mot de passe
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                    Retour à la connexion
                </a>
            </p>
        </div>
    </div>
@endsection 