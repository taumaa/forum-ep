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
                <div class="flex flex-row gap-5 my-1 mx-5">
                    <div>
                        <p>logo</p>
                    </div>
                    <div>
                        <p>Nom_entreprise</p> 
                        <div>
                            <li>
                                @for ($j = 0; $j < 3; $j++) 
                                    <ul>secteur {{$j}}</ul>
                                @endfor
                            </li>
                        </div>
                        <div>
                            <li>
                                @for ($k = 0; $k < 3; $k++)
                                    <ul>filiere {{$k}}</ul>
                                @endfor
                            </li>
                        </div>
                        <div>
                            Lorem Ipsum est simplement du faux texte employé dans  la composition et la mise en page avant impression. Le Lorem Ipsum est  le faux texte standard de l'imprimerie depuis les années 1500, quand un  imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser  un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans  que son contenu n'en soit modifié.
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>

@endsection
