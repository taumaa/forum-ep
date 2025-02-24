@extends('layouts.main')

@section('title', 'Admin') <!-- Définir un titre spécifique -->

@section('content')
    <h1>Page toto</h1>
    <h2>Anne fait des tests, ne pas supprimer.</h2>

    {{-- ENREGISTRER UN LOGO POUR UNE ENTREPRISE --}}
    <form action="{{ url('/upload-logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="name" value="company-1">
        <input type="file" name="image" accept="image/*">
        <button type="submit">Télécharger un logo d'une entreprise</button>
    </form>

    {{-- ENREGISTRER UN CV POUR UN ETUDIANT --}}
    <form action="{{ url('/upload-cv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="student" value="nom-prenom">
        <input type="file" name="cv" accept="application/pdf">
        <button type="submit">Télécharger un CV d'un étudiant</button>
    </form>

@endsection




