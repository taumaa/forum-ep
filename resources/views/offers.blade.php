@extends('layouts.main')

@section('title', 'offres') <!-- Définir un titre spécifique -->

@section('content')
    <div class="container company gap-5 my-4 mx-5">
        @foreach ($internship_offers as $offer) 
        <div class="offer-container company gap-5 my-4 gray">
            <div>
                <img src="{{ $offer->company_logo }}" alt="Logo {{ $offer->company_name }}">
            </div>
            <div>
                <h1>{{ $offer->title }}</h1> 
                <div>
                    <a href="{{ url('/exposants/' . $offer->company_id) }}"><h2>{{ $offer->company_name }}</h2></a>
                    <div class="flex flex-row flex-wrap mb-1 mt-4" >
                        @foreach ($offer->school_path_labels as $path)
                            <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $path }}</p>
                        @endforeach
                        @foreach ($offer->school_level_labels as $level)
                            <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $level }}</p>
                        @endforeach
                    </div>
                    <div class="flex flex-row flex-wrap my-1">
                        <p class="p-1 px-4 min-w-40 mr-1 text-center">{{ $offer->date }}</p>
                        <p class="p-1 px-4 min-w-40 text-center">{{ $offer->location }}</p>
                    </div>
                    <a href="" class="flex flex-row my-3 min-w-40 text-center">Retrouver l'offre ici : {{ $offer->offer_description }} </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection


