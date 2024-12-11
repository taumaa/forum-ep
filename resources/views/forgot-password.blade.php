@extends('layouts.main')

@section('title', 'Mot de passe oublié')

@section('content')
    <div class="container">
        <div class="">
            <h1 class="mt-10 text-center text-3xl">
                Mot de passe oublié
            </h1>
        </div>

        <div class="mt-8 mx-32">
            <div class="mb-4 text-sm text-gray-600 text-center">
                Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
            </div>

            <form class="space-y-6" action="/forgot-password" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="email" class="absolute white mb-2 ml-4 px-3">Mail</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="register-input">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center items-center py-5">
                    <button type="submit" class="button-color border-2 px-6 py-2">
                        Envoyer le lien
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
