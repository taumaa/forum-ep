@extends('layouts.main')

@section('title', 'Accueil') <!-- Définir un titre spécifique -->

@section('content')
    <section> 
        <img src="{{ asset('storage/images/ESIEE-Home-Main-Picture.webp') }}" alt="">
    </section>

    <section class="white"> 
        <div class="container">
            <h1>Présentation</h1> 
            <p class="my-3 mx-5 text-justify"> Lorem Ipsum est simplement du faux texte employé dans  la composition et la mise en page avant impression. Le Lorem Ipsum est  le faux texte standard de l'imprimerie depuis les années 1500, quand un  imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser  un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans  que son contenu n'en soit modifié. Il a été popularisé dans les années  1960 grâce à la vente de feuilles Letraset contenant des passages du  Lorem Ipsum, et, plus récemment, par son inclusion dans des  </p>
        </div>
    </section>

    <section class="gray"> 
        <div class="container">
            <h1>Infos pratiques</h1>
            <div id="pratical-informations"class="flex flex-wrap justify-center items-center my-3">
                <p class="dark-pink">Date</p>
                <p class="dark-pink">Heure</p>
                <p class="dark-pink">Lieu</p>
                <a href="https://www.esiee.fr/informations/plan-dacces" class="dark-pink"><p>Plan d'accès ></p></a>
                <a href="https://www.esiee.fr/formations/les-formations-esiee-paris" class="dark-pink"><p>Nos filières ></p></a>
            </div>
        </div>
    </section>

    <section class="white"> 
        <div class="container">
            <h1 class="mb-3">Entreprises présentent cette année</h1>
            @for ($i = 0; $i < 7; $i++)
                <div class="flex flex-row gap-5 my-1 mx-5" >
                    <p>logo</p>
                    <p>nom_entreprise</p>
                </div>
            @endfor
            <div id="pratical-informations"class="flex flex-wrap my-3">
                <a href="{{ url('/devis') }}" class="light-blue p-1 w-44 text-center mx-4 my-3"><p>Faire un devis ></p></a>
                <a href="{{ url('/exposants') }}" class="light-blue p-1 w-44 text-center mx-4 my-3"><p>Voir plus ></p></a>
            </div>
        </div>
    </section>

    <section class="light-blue"> 
        <div class="container">
            <h2>Retrouver nos éditions précédentes : </h2>
            <a href="{{ url('/editionsprecedentes/2021') }}" class="gray p-1 w-36 text-center mx-5 my-3"> Découvrir > </a>
        </div>
    </section>

    <section class="white px-30"> 
        <div class="container">
            video
        </div>
    </section>
    
@endsection
