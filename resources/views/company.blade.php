@extends('layouts.main')

@section('title', 'entreprise') <!-- Définir un titre spécifique -->

@section('content')
        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">Nom entreprise</h1>
                <div class="company flex flex-row gap-5 my-4 mx-5">
                    <div>
                        <h2>logo</h2>
                    </div>
                    <div>
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
                        <p class="pt-4">
                            Lorem Ipsum est simplement du faux texte employé dans  la composition et la mise en page avant impression. Le Lorem Ipsum est  le faux texte standard de l'imprimerie depuis les années 1500, quand un  imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser  un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans  que son contenu n'en soit modifié.
                        </p>
                    </div>
                </div>
                <div>
                    <h2>Nos offres de stages</h2>
                    <div>
                        @for ($i = 0; $i < 7; $i++)
                            <div class="dark-pink flex flex-col gap-5 mb-5" >
                                <h3>Intitulé du stage</h3>
                                <div class="flex flex-row gap-5 mb-5 justify-center" >
                                    <p class="p-1 px-4 min-w-40 text-center">filieres</p>
                                    <p class="p-1 px-4 min-w-40 text-center">PDF/lien</p>
                                    <p class="p-1 px-4 min-w-40 text-center">lieu</p>
                                    <p class="p-1 px-4 min-w-40 text-center">dates</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
@endsection


