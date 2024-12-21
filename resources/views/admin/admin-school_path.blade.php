@extends('admin.layout')

@section('content')

    <div class="container my-8">

        @if (isset($school_path) && $school_path)

            <h1>Filière {{ $school_path->school_path_label }}</h1>

            <form method="POST" action="/editer-filiere/{{ $school_path->school_path_id }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom de la filière :</label>
                    <input type="text" id="label" name="label" value="{{ $school_path->school_path_label }}">
                    <input type="hidden" name="id" value="{{ $school_path->school_path_id }}">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouvelle filière</h1>

            <form method="POST" action="/creer-filiere">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom de la filière :</label>
                    <input type="text" id="label" name="label">
                </div>

                <input type="submit" value="Créer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @endif
        
    </div>

@endsection
