@extends('layouts.main')

@section('title', 'Admin') <!-- Définir un titre spécifique -->

@section('content')
    <h1>Page admin</h1>
    <p>Ceci est le contenu de la page admin.</p>

    <a href="{{ url('/get-all-companies') }}"><p>Télécharger la liste des entreprises</p></a>
    <a href="{{ url('/get-all-students') }}"><p>Télécharger la liste des étudiants</p></a>
@endsection




