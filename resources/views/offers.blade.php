@extends('layouts.main')

@section('title', 'offres') <!-- Définir un titre spécifique -->

@section('content')
    @vite(['resources/js/offers-filters.js'])
    
    <div class="container company gap-5 mx-5">
        <div id="filters-container" class="filters-container w-screen gray py-3">
            <div class="filters flex flex-row gap-5">
                <input type="search" id="offers-search" name="q"  placeholder="Rechercher un stage..."/>
                <select id="paths" name="paths">
                <option value="">--Filieres--</option>
                    @foreach ($all_paths as $path)
                        <option value="{{ $path->school_path_label }}">{{ $path->school_path_label }}</option>
                    @endforeach
                </select>
                <select id="levels" name="levels">
                <option value="">--Niveaux--</option>
                    @foreach ($all_levels as $level)
                        <option value="{{ $level->school_level_label }}">{{ $level->school_level_label }}</option>
                    @endforeach
                </select>
                <select id="months" name="months">
                    <option value="">--Début du stage--</option>
                    @foreach ($all_months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
 
        @if (!$internship_offers->isEmpty())
            <div class="my-12">
            @foreach ($internship_offers as $offer)
            <div class="offer-container company gap-5 gray"
                    data-paths="{{ implode(',', $offer->school_path_labels) }}"
                    data-levels="{{ implode(',', $offer->school_level_labels) }}"
                    data-month="{{ $offer->date }}"
                    data-title="{{ $offer->title }}">
                <div>
                    <img src="{{ asset('storage/company-logos/' . $offer->company_logo) }}" class="logos-companies" alt="Logo {{ $offer->company_name }}">
                </div>
                <div>
                    <h1>{{ $offer->title }}</h1> 
                    <div>
                        <a href="{{ url('/exposants/' . $offer->company_id) }}"><h2 class="underline-hover">{{ $offer->company_name }}</h2></a>
                        <div class="flex flex-row flex-wrap mb-1 mt-4" >
                            @foreach ($offer->school_path_labels as $path)
                                <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $path }}</p>
                            @endforeach
                            @foreach ($offer->school_level_labels as $level)
                                <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $level }}</p>
                            @endforeach
                        </div>
                        <div class="flex flex-row flex-wrap my-1">
                            <p class="p-1 px-4 min-w-40 mr-1 mb-1 text-center">{{ $offer->location }}</p>
                            <p class="p-1 px-4 min-w-40 mr-1 mb-1 text-center">{{ $offer->min_duration }} - {{ $offer->max_duration }} mois</p>
                            <p class="p-1 px-4 min-w-40 mb-1 text-center">{{ $offer->date }}</p>
                        </div>
                        <a href="" class="flex flex-row my-3 min-w-40 text-center underline-hover">Retrouver l'offre ici : {{ $offer->offer_description }} </a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p class="p-1 px-4 min-w-40 mt-20">Aucune offre de stage à proposer</p>
        @endif
    </div>
@endsection


