@extends('admin.layout')

@section('content')

    <div class="container my-8">

        @if (isset($edition) && $edition)

            <h1>Édition du forum {{ \Illuminate\Support\Str::before($edition->date, '-') }}</h1>

            <form method="POST" action="/editer-edition/{{ \Illuminate\Support\Str::before($edition->date, '-') }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="date" class="white mb-2 ml-4 px-3">Date de l'édition :</label>
                    <input type="date" id="date" name="date" value="{{ $edition->date }}">
                </div>

                <div class="form-group mt-6">
                    <label for="start-time" class="white mb-2 ml-4 px-3">Heure de début :</label>
                    <input type="time" id="start-time" name="start-time" value="{{ $edition->starting_hour }}">
                </div>

                <div class="form-group mt-6">
                    <label for="end-time" class="white mb-2 ml-4 px-3">Heure de fin :</label>
                    <input type="time" id="end-time" name="end-time" value="{{ $edition->ending_hour }}">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouvelle édition de forum</h1>

            <form method="POST" action="/creer-edition">
                @csrf
                <div class="form-group mt-6">
                    <label for="date" class="white mb-2 ml-4 px-3">Date de l'édition :</label>
                    <input type="date" id="date" name="date">
                </div>

                <div class="form-group mt-6">
                    <label for="start-time" class="white mb-2 ml-4 px-3">Heure de début :</label>
                    <input type="time" id="start-time" name="start-time">
                </div>

                <div class="form-group mt-6">
                    <label for="end-time" class="white mb-2 ml-4 px-3">Heure de fin :</label>
                    <input type="time" id="end-time" name="end-time">
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @endif
        
    </div>

    @vite(['resources/js/admin.js'])

@endsection
