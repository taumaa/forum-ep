@extends('layouts.main')

@section('title', '404') <!-- Définir un titre spécifique -->

@section('content')
    <h1>Cette page n'existe pas ou n'est pas accessible</h1>
    <a href="{{ url('/') }}"> Retourner à l'accueil </a>
@endsection




