@extends('admin.layout')

@section('content')

    <div class="container my-8">

        @if (isset($option) && $option)

            <h1>Option {{ $option->option_label }}</h1>

            <form method="POST" action="/editer-option/{{ $option->option_id }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom de l'option :</label>
                    <input type="text" id="label" name="label" value="{{ $option->option_label }}">
                    <input type="hidden" name="id" value="{{ $option->option_id }}">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouvelle option de stand</h1>

            <form method="POST" action="/creer-option">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom de l'option :</label>
                    <input type="text" id="label" name="label">
                </div>

                <input type="submit" value="Créer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @endif
        
    </div>

@endsection
