@extends('layouts.main')

@section('title', 'Connexion')

@section('content')
    <div class="container">
        <div class="">
            <h1 class="mt-10 text-center text-3xl ">
                Connexion
            </h1>
        </div>

        <div class="mt-8 mx-32">
            <form class="space-y-6" action="/login" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="email" class="absolute white mb-2 ml-4 px-3">Mail</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="register-input">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password" class="absolute white mb-2 ml-4 px-3">Mot de passe</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="register-input">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center items-center py-5">
                    <button type="submit" class="button-color border-2 px-6 py-2">
                        Connexion
                    </button>
                </div>
            </form>

            <p class="mt-5 text-center text-sm text-gray-500">
                Pas encore de compte ?
                <a href="/register" class="font-semibold dark-pink-text underline-hover">
                    Inscription
                </a>
            </p>
        </div>
    </div>
@endsection
