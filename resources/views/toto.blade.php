@extends('layouts.main')

@section('title', 'Admin') <!-- Définir un titre spécifique -->

@section('content')
    <h1>Page toto</h1>
    <h2>Anne fait des tests, ne pas supprimer.</h2>

    {{-- RECUPERE UN EXCEL AVEC TOUTES LES ENTREPRISES --}}
    <a href="{{ url('/get-all-companies') }}"><p>Télécharger la liste des entreprises</p></a>

    {{-- RECUPERE UN EXCEL AVEC TOUS LES ETUDIANTS --}}
    <a href="{{ url('/get-all-students') }}"><p>Télécharger la liste des étudiants</p></a>

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

    {{-- TELECHARGER ET VOIR LE CV D'UN ETUDIANT --}}
    {{-- /!\ VÉRIFIER S'IL Y A UN NOM DE CV ENREGISTRÉ DANS LA BDD AVANT --}}
    <a href="{{ asset('storage/cvs/' . 'cv-nom-prenom.pdf') }}" download="cv-nom-prenom.pdf">Télécharger un CV étudiant</a><br>
    <a href="{{ asset('storage/cvs/' . 'cv-nom-prenom.pdf') }}" target="_blank">Voir un CV étudiant</a>

@endsection




