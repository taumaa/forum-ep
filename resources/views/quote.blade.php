@extends('layouts.main')

@section('title', 'devis') <!-- Définir un titre spécifique -->

@section('content')
    <section class="quote-container">
            <div>
                <h2>Ajouter le logo</h2>   
            </div>
            <div class="flex flex-col flex-grow">
                
                <div class="mb-2 flex flex-grow">
                    <label for="first_name" class="absolute white">Nom de l'entreprise :*</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
                </div>
                
                <div class="mt-2">
                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">N° de SIRET :*</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
                </div>
                
                <div class="mt-2">
                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">N° de TVA intracommunautaire :*</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
                </div>
        </div>
    </section>

    <section class="container ">
        <div>
            
            <div class="mt-2">
            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Adresse de facturation :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
            
            <div class="mt-2">
            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Code postal :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
            
            <div class="mt-2">
            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Ville :*</label>
                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
            </div>
        </div>
        
        <div class="mt-2">
        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Emettez-vous un bon de commande interne ?*</label>
            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
        </div>
        
        <div class="mt-2">
        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Nom Prénom du signataire :*</label>
            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="quote-input ">
        </div>
    </section>

    <section class="container px-20">
        <label for="dropdown">Choisissez une option :</label>
        <select id="dropdown" name="options">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
        </select>
        <label for="dropdown">Choisissez une option :</label>
        <select id="dropdown" name="options">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
        </select>
        <label for="dropdown">Choisissez une option :</label>
        <select id="dropdown" name="options">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
        </select>
        <label for="dropdown">Choisissez une option :</label>
        <select id="dropdown" name="options">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
        </select>
        <label for="dropdown">Type de stand souhaité :</label>
        <select id="dropdown" name="options">
            <option value="option1">Stand classique</option>
            <option value="option2">Stand grands partenaires</option>
            <option value="option3">TPE (- de 50 salariés)</option>
        </select>
    </section>

    <section class="container px-20">
        <button>Envoyer</button>
    </section>   
@endsection
