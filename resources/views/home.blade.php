@extends('layouts.main')

@section('title', 'Accueil') <!-- Définir un titre spécifique -->

@section('content')
    <section class="relative flex flex-col justify-end"> 
        <div class="absolute flex flex-column flex-end gap-3 margin">
            <h1 class="text-home-color font-semibold">Forum Esiee Paris</h1>
            <h2 class="text-home-color font-normal">Venez partager avec des professionnels.</h2>
        </div>
        @if($home_informations && $home_informations->image)
            <img class="home-image" src="{{ asset('storage/images/' . $home_informations->image) }}" alt="Image d'accueil">
        @endif
    </section>

    <section class="white"> 
        <div class="container">
            <h1>Présentation</h1> 
            <p class="my-3 mx-5 text-justify">{{ $home_informations->description }}</p>
        </div>
    </section>

    <section class="gray py-2"> 
        <div class="container">
            <h1>Infos pratiques</h1>
            <div id="pratical-informations"class="flex flex-wrap justify-center items-center py-5">
                <p class="dark-pink">{{ $formatted_date }}</p>
                <p class="dark-pink">{{ $latest_forum->starting_hour }} - {{ $latest_forum->ending_hour }}</p>
                <p class="dark-pink">{{ $home_informations->building }}</p>
                <a href="https://www.esiee.fr/informations/plan-dacces" class="dark-pink" target="_blank"><p>Plan d'accès ></p></a>
                <a href="https://www.esiee.fr/formations/les-formations-esiee-paris" class="dark-pink" target="_blank"><p>Nos filières ></p></a>
            </div>
        </div>
    </section>

    <section class="white"> 
        <div class="container">
            <h1 class="mb-3">Entreprises présentes cette année</h1>
            <div class="flex flex-row overflow-hidden">
                @if (!$companies->isEmpty())
                    @foreach($companies as $company)
                    <a class="gray px-3 pt-5 pb-3 mx-7" href="{{ url('/exposants/' . $company->company_id) }}">
                        <div class="logos-home-div">
                            <img src="{{ asset('storage/company-logos/' . $company->logo) }}" alt="Logo {{ $company->name }}" class="logos-home object-contain">
                        </div>
                        <div class="self-end">
                            <p class="light-blue-text font-semibold text-2xl text-center pb-3 pt-5">{{ $company->name }}</p>
                        </div>
                    </a>
                    @endforeach
                @else
                    <p class="p-1 px-4 min-w-40">Aucune entreprise n'est encore inscrite</p>
                @endif
            </div>
            <div id="pratical-informations"class="flex flex-wrap my-3 mx-7">
                <a href="{{ url('/devis') }}" class="light-blue p-1 w-44 text-center mr-4 my-3"><p>Faire un devis ></p></a>
                <a href="{{ url('/exposants') }}" class="light-blue p-1 w-44 text-center ml-4 my-3"><p>Voir plus ></p></a>
            </div>
        </div>
    </section>

    <section class="light-blue py-4 flex flex-row discover items-center"> 
        <div class="container">
            <h2 class="mb-3">Accéder à toutes les offres : </h2>
            <a href="{{ url('/offres') }}" class="gray p-1 w-36 text-center mx-5 my-3"> Découvrir > </a>
        </div>
        <div class="flex flex-grow justify-end">
            <img src="{{ asset('storage/images/photo-stages-accueil.jpg') }}" alt="Image d'illustration" class="">
        </div>
    </section>

    <section class="white px-30"> 
        <div class="container">
            <video width="640" height="360" controls>
                @if($home_informations && $home_informations->video)
                    <source src="{{ asset('storage/images/' . $home_informations->video) }}" type="video/mp4">
                @endif
                Vidéo du forum non prise en charge
            </video>
        </div>
    </section>
    
@endsection
