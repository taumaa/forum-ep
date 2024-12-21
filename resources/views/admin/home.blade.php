@extends('admin.layout')

@section('content')

    <div class="container my-8">
        <h1>Administration du site</h1>

        <div class="mt-8">
            <!-- Onglets -->
            <ul class="tab-titles flex-wrap">
                <li class="tab-title active" id="tab1" >Éditions de forum</li>
                <li class="tab-title" id="tab2" >Filières</li>
                <li class="tab-title" id="tab3" >Niveaux d'étude</li>
                <li class="tab-title" id="tab4" >Secteurs d'activité</li>
                <li class="tab-title" id="tab5" >Options de stand</li>
                <li class="tab-title" id="tab6" >FAQ</li>
                <li class="tab-title" id="tab7" >Paramètres globaux</li>
                <li class="tab-title" id="tab8" >Administrateurs</li>
            </ul>

            <!-- Contenu des onglets -->
            <div class="tab-content" id="content1">
                <div class="flex">
                    <h2>Éditions de forum</h2>
                    <a href="{{ url('/creer-edition') }}"><img id="img-plus" src="{{ asset('storage/images/plus.png') }}"></a>
                </div>

                @foreach ($years as $year)
                    <div class="flex">
                        <a href="{{ url('/editer-edition/' . $year->year) }}"><img src="{{ asset('storage/images/edit.png') }}"></a>
                        <a href="{{ url('/supprimer-edition/' . $year->year) }}"><img src="{{ asset('storage/images/delete.png') }}"></a>
                        <p>Édition {{ $year->year }}</p>
                    </div>
                @endforeach
            </div>

            <div class="tab-content" id="content2">
                <div class="flex">
                    <h2>Filières</h2>
                    <a href="{{ url('/creer-filiere') }}"><img id="img-plus" src="{{ asset('storage/images/plus.png') }}"></a>
                </div>

                @foreach ($school_paths as $school_path)                    
                    <div class="flex">
                        <a href="{{ url('/editer-filiere/' . $school_path->school_path_id) }}"><img src="{{ asset('storage/images/edit.png') }}"></a>
                        <a href="{{ url('/supprimer-filiere/' . $school_path->school_path_id) }}"><img src="{{ asset('storage/images/delete.png') }}"></a>
                        <p>Filière {{ $school_path->school_path_label }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class="tab-content" id="content3">
                <div class="flex">
                    <h2>Niveaux d'étude</h2>
                    <a href="{{ url('/creer-niveau') }}"><img id="img-plus" src="{{ asset('storage/images/plus.png') }}"></a>
                </div>

                @foreach ($school_levels as $school_level)                    
                    <div class="flex">
                        <a href="{{ url('/editer-niveau/' . $school_level->school_level_id) }}"><img src="{{ asset('storage/images/edit.png') }}"></a>
                        <a href="{{ url('/supprimer-niveau/' . $school_level->school_level_id) }}"><img src="{{ asset('storage/images/delete.png') }}"></a>
                        <p>Niveau {{ $school_level->school_level_label }}</p>
                    </div>
                @endforeach
            </div>

            <div class="tab-content" id="content4">
                <h2>Contenu de l'Onglet 4</h2>
                <p>Voici le contenu pour l'onglet 4.</p>
            </div>

            <div class="tab-content" id="content5">
                <h2>Contenu de l'Onglet 5</h2>
                <p>Voici le contenu pour l'onglet 5.</p>
            </div>

            <div class="tab-content" id="content6">
                <h2>Contenu de l'Onglet 6</h2>
                <p>Voici le contenu pour l'onglet 6.</p>
            </div>

            <div class="tab-content" id="content7">
                <h2>Contenu de l'Onglet 7</h2>
                <p>Voici le contenu pour l'onglet 7.</p>
            </div>

            <div class="tab-content" id="content8">
                <h2>Contenu de l'Onglet 8</h2>
                <p>Voici le contenu pour l'onglet 8.</p>
            </div>
        </div>

    </div>

    @vite(['resources/js/admin.js'])

@endsection
