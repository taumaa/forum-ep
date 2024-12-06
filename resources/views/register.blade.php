@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="">
            <h1 class="mt-10 text-center text-3xl ">
                Incription pour les étudiants
            </h1>
        </div>

        <div class="mt-8 mx-32">
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="first_name" class="absolute white mb-2 ml-4 px-3">Prénom :*</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="register-input">
                    @error('first_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="last_name" class="absolute white mb-2 ml-4 px-3">Nom :*</label>
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name" required class="register-input">
                    @error('last_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group mt-2">
                    <label for="email" class="absolute white mb-2 ml-4 px-3">Email ESIEE Paris :*</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="register-input">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group mr-8 my-1">
                    <label for="dropdown" class="mr-1">Filiere :*</label>
                    <select id="dropdown" name="options">
                        @foreach ($school_paths as $school_path)
                            <option value="{{$school_path->school_path_label}}" class="">{{$school_path->school_path_label}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mr-8 my-1">
                    <label for="dropdown" class="mr-1">Niveau :*</label>
                    <select id="dropdown" name="options">
                        @foreach ($school_levels as $school_level)
                            <option value="{{$school_level->school_level_label}}">{{$school_level->school_level_label}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="password" class="absolute white mb-2 ml-4 px-3">Mot de passe :*</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="register-input">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password_confirmation" class="absolute white mb-2 ml-4 px-3">Confirmation du mot de passe :*</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="register-input">
                </div>

                <div class="flex justify-center items-center py-5">
                    <button type="submit" class="button-color border-2 px-6 py-2">
                        Inscription
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                    Connexion
                </a>
            </p>
        </div>
    </div>
@endsection
