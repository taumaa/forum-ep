@extends('layouts.main')

@section('title', 'faq') <!-- Définir un titre spécifique -->

@section('content')
    <div class="container gap-5 my-4 mx-5 pt-3 pb-7">
        <h1>Foire aux questions</h1>
        @foreach ($faqs as $faq) 
            <div class="flex flex-col my-1">
                <details>
                    <summary class="gray py-1 px-3 text-2xl cursor-pointer">{{ $faq->question }}</summary>
                    <p class="white mx-9 border-l-2 border-dotted pl-2">{{ $faq->answer }}</p>
                </details>               
            </div>
        @endforeach
    </div>
@endsection
