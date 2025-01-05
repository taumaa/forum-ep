@extends('layouts.main')

@section('title', 'devis') <!-- Définir un titre spécifique -->

@section('content')
    <div class="container">
        <h1 class="mt-10 text-center text-3xl">Faire une demande de devis</h1>
    </div>

    <form action="/quote-validation">
        <section class="container mt-8 mx-5">
            <div class="flex flex-col flex-grow">
                <div class="form-group mt-6">
                    <label for="Nom_entreprise" class="absolute white mb-2 ml-4 px-3">Nom de l'entreprise :*</label>
                    <input id="Nom_entreprise" name="Nom_entreprise" type="text" autocomplete="given-name" required class="quote-input ">
                </div>
                
                <div class="form-group mt-2">
                    <label for="Numero_de_siret" class="absolute white mb-2 ml-4 px-3">N° de SIRET :*</label>
                    <input id="Numero_de_siret" name="Numero_de_siret" type="text" autocomplete="" required class="quote-input ">
                </div>
                
                <div class="form-group mt-2">
                    <label for="TVA" class="absolute white mb-2 ml-4 px-3">N° de TVA intracommunautaire :*</label>
                    <input id="TVA" name="TVA" type="text" autocomplete="" required class="quote-input ">
                </div>
            </div>

            <div class="form-group mt-2">
                <label for="Adresse_de_facturation" class="absolute white mb-2 ml-4 px-3">Adresse de facturation :*</label>
                <input id="Adresse_de_facturation" name="Adresse_de_facturation" type="text" autocomplete="street-address" required class="quote-input ">
            </div>
            
            <div class="flex flex-row">
                <div class="form-group max-w-40 mt-2 mr-4">
                    <label for="Code_postal" class="absolute white mb-2 ml-4 px-3">Code postal :*</label>
                    <input id="Code_postal" name="Code_postal" type="text" autocomplete="postal-code" required class="quote-input ">
                </div>
                
                <div class="form-group mt-2 flex flex-grow">
                    <label for="Ville" class="absolute white mb-2 ml-4 px-3">Ville :*</label>
                    <input id="Ville" name="Ville" type="text" autocomplete="street-address" required class="quote-input ">
                </div>
            </div>
            
            <div class="form-group mt-2">
                <label for="Bon_de_commande" class="absolute white mb-2 ml-4 px-3">Emettez-vous un bon de commande interne ?*</label>
                <input id="Bon_de_commande" name="Bon_de_commande" type="text" autocomplete="" required class="quote-input ">
            </div>
            
            <div class="form-group mt-2">
                <label for="Nom_du_signataire" class="absolute white mb-2 ml-4 px-3">Nom Prénom du signataire :*</label>
                <input id="Nom_du_signataire" name="Nom_du_signataire" type="text" autocomplete="family-name" required class="quote-input ">
            </div>

            <div class="mb-8">
                <fieldset class="flex flex-row">
                    <div class="my-1 mt-2 min-w-80">
                        <legend class="text-left flex-grow">Quel type de stand voulez vous ?*</legend>
                    </div>
                    <div class="form-group mt-2 mx-3">
                        <input type="radio" name="Type_de_stand" id="classic-stand" value="Stand classique" required/>
                        <label for="classic-stand">Stand classique</label>
                    </div>
                    <div class="form-group mt-2 mx-3">
                        <input type="radio" name="Type_de_stand" id="partner-stand" value="Stand grands partenaires" required/>
                        <label for="partner-stand">Stand grands partenaires</label>
                    </div>
                    <div class="form-group mt-2 mx-3">
                        <input type="radio" name="Type_de_stand" id="sme" value="Stand TPE" required/>
                        <label for="sme">TPE (- de 50 salariés)</label>
                    </div>
                </fieldset>
            </div>
            <div class="options-container flex-wrap justify-between">
            @foreach ($options as $option)
                <div class="form-group mr-8 my-1">
                    <label for="dropdown" class="mr-1">{{$option->option_label}}</label>
                    <select id="dropdown" name="{{$option->option_label}}">
                        @for ($j=0; $j<11; ++$j)
                            <option value="{{$j}}">{{$j}}</option>
                        @endfor
                    </select>
                </div>
            @endforeach
            </div>
        </section>

        <section class="flex justify-center items-center mt-5">
            <input type="submit" value="Envoyer" class="button-color border-2 px-6 py-2">
        </section>   
    </form>
    
@endsection



