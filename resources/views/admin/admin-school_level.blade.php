@extends('admin.layout')

@section('content')

    <div class="container my-8">
    
        @if (isset($school_level) && $school_level)

            <h1>Niveau {{ $school_level->school_level_label }}</h1>

            <form method="POST" action="/editer-niveau/{{ $school_level->school_level_id }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom du niveau :</label>
                    <input type="text" id="label" name="label" value="{{ $school_level->school_level_label }}">
                    <input type="hidden" name="id" value="{{ $school_level->school_level_id }}">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouveau niveau d'étude</h1>

            <form method="POST" action="/creer-niveau">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom du niveau :</label>
                    <input type="text" id="label" name="label">
                </div>

                <input type="submit" value="Créer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @endif
        
    </div>

@endsection
