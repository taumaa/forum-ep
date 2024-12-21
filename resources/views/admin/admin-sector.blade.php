@extends('admin.layout')

@section('content')

    <div class="container my-8">

        @if (isset($sector) && $sector)

            <h1>{{ $sector->sector_label }}</h1>

            <form method="POST" action="/editer-secteur/{{ $sector->sector_id }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="label" class="white mb-2 ml-4 px-3">Nom du secteur d'activité :</label>
                    <input type="text" id="label" name="label" value="{{ $sector->sector_label }}">
                    <input type="hidden" name="id" value="{{ $sector->sector_id }}">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouveau secteur d'activité</h1>

            <form method="POST" action="/creer-secteur">
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
