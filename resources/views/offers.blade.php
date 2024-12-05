@extends('layouts.main')

@section('title', 'offres') <!-- Définir un titre spécifique -->

@section('content')
    <div class="container company gap-5 my-4 mx-5">
        @for ($i = 0; $i < 5; $i++) 
        <div class="offer-container company gap-5 my-4 gray">
            <div>
                <h1>logo</h1>
            </div>
            <div>
                <h1>Nom de l'offre</h1> 
                <div>
                    <h2>Nom de l'entreprise</h2>
                    <div class="flex flex-row gap-5 mb-1 mt-4" >
                        @for ($j = 0; $j < 3; $j++) 
                            <p class="p-1 px-4 min-w-40 text-center">filiere de l'universite  {{$j}}</p>
                        @endfor
                    </div>
                    <div class="flex flex-row gap-5 my-1">
                        <p class="p-1 px-4 min-w-40 text-center">Dates</p>
                        <p class="p-1 px-4 min-w-40 text-center">Lieu</p>
                    </div>
                    <a href="" class="flex flex-row gap-5 min-w-40 text-center">Retrouver l'offre ici : (pdf/lien) </a>
                </div>
            </div>
        </div>
        @endfor
    </div>
@endsection


