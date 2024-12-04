@extends('layouts.main')

@section('title', 'editions precedentes') <!-- Définir un titre spécifique -->

@section('content')
        <section> 
            <div>
                EDITIONS PRECEDENTES > 2021
            </div>
        </section>

        <section> 
            <img src="{{ asset('storage/images/ESIEE-Home-Main-Picture.webp') }}" alt="">
        </section>

        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">Les entreprises ayant participées en 2021</h1>
                @for ($i = 0; $i < 7; $i++)
                    <div class="company flex flex-row gap-5 my-4 mx-5">
                        <div>
                            <h2>logo</h2>
                        </div>
                        <div>
                            <h2>Nom_entreprise</h2> 
                            <div class="flex flex-row gap-5 mb-1 mt-4" >
                                @for ($j = 0; $j < 3; $j++) 
                                    <p class="p-1 px-4 min-w-40 text-center">secteur {{$j}}</p>
                                @endfor
                            </div>
                            <div class="flex flex-row gap-5 my-1">
                                @for ($k = 0; $k < 3; $k++)
                                    <p class="p-1 px-4 min-w-40 text-center">filiere de l'universite {{$k}}</p>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>
   

@endsection
