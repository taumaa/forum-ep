@extends('layouts.main')

@section('title', 'devis') <!-- Définir un titre spécifique -->

@section('content')
    <section class="quote-container flex flex-row gap-16 my-4 mx-5">
        <div>
            <h2>Ajouter le logo</h2>   
        </div>
        <div class="flex flex-col flex-grow">
            <div class="form-group mt-2">
                <label for="first_name" class="absolute white mb-2 ml-4 px-3">Nom de l'entreprise :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
            
            <div class="form-group mt-2">
                <label for="first_name" class="absolute white mb-2 ml-4 px-3">N° de SIRET :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
            
            <div class="form-group mt-2">
                <label for="first_name" class="absolute white mb-2 ml-4 px-3">N° de TVA intracommunautaire :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
        </div>
    </section>

    <section class="container my-4 mx-5">
        <div class="form-group mt-2">
            <label for="first_name" class="absolute white mb-2 ml-4 px-3">Adresse de facturation :*</label>
            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
        </div>
        
        <div class="flex flex-row">
            <div class="form-group max-w-40 mt-2 mr-4">
                <label for="first_name" class="absolute white mb-2 ml-4 px-3">Code postal :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
            
            <div class="form-group mt-2 flex flex-grow">
                <label for="first_name" class="absolute white mb-2 ml-4 px-3">Ville :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
        </div>
        
        <div class="form-group mt-2">
            <label for="first_name" class="absolute white mb-2 ml-4 px-3">Emettez-vous un bon de commande interne ?*</label>
            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
        </div>
        
        <div class="form-group mt-2">
            <label for="first_name" class="absolute white mb-2 ml-4 px-3">Nom Prénom du signataire :*</label>
            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
        </div>
    </section>

    <section class="container mb-16">
        <div class="mb-8">
            <fieldset class="flex flex-row">
                <div class="my-1 mt-2 min-w-80">
                    <legend class="text-left flex-grow">Quel type de stand voulez vous ?*</legend>
                </div>
                <div class="form-group mt-2 mx-3">
                    <input type="radio" id="classic-stand" name="drone" value="classic-stand" />
                    <label for="classic-stand">Stand classique</label>
                </div>
                <div class="form-group mt-2 mx-3">
                    <input type="radio" id="partner-stand" name="drone" value="partner-stand" />
                    <label for="partner-stand">Stand grands partenaires</label>
                </div>
                <div class="form-group mt-2 mx-3">
                    <input type="radio" id="sme" name="drone" value="sme" />
                    <label for="sme">TPE (- de 50 salariés)</label>
                </div>
            </fieldset>
        </div>
        <div class="options-container flex-wrap">
            @for ($i=0; $i<6; ++$i)
                <div class="form-group mr-8 my-1">
                    <label for="dropdown" class="mr-1">Choisissez une option :</label>
                    <select id="dropdown" name="options">
                        @for ($j=0; $j<11; ++$j)
                            <option value="{{$j}}">{{$j}}</option>
                        @endfor
                    </select>
                </div>
            @endfor
        </div>
    </section>

    <section class="flex justify-center items-center">
        <button class="button-color border-2 px-6 py-2">Envoyer</button>
    </section>   
@endsection



