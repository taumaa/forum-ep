@extends('layouts.main')

@section('title', 'faq') <!-- Définir un titre spécifique -->

@section('content')
    <div class="container gap-5 my-4 mx-5">
        @for ($i = 0; $i < 5; $i++) 
            <div class="flex flex-col my-1">
                <details>
                    <summary class="gray py-1 px-3 text-2xl cursor-pointer">question ?</summary>
                    <p class="white mx-9 border-l-2 border-dotted pl-2">reponse</p>
                </details>               
            </div>
        @endfor
    </div>
@endsection
