@extends('layouts.main')

@section('title', 'demande de devis envoyée') <!-- Définir un titre spécifique -->

@section('content')

    <section class="white">
        <div class="container">
            <h1>Votre demande a été envoyée.</h1>
            <h2>Vous recevrez un email avec vos identifiants une fois le devis validé.</h2>
            <a href="{{ url('/') }}"><p class="underline-hover">Retourner à l'accueil</p></a>
        </div>
    </section>

@endsection
