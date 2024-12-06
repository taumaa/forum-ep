@extends('layouts.main')

@section('title', 'entreprise') <!-- Définir un titre spécifique -->

@section('content')
        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">{{ $company->name }}</h1>
                <div class="company flex flex-row gap-5 my-4 mx-5">
                    <div>
                        <img src="{{ $company->logo }}" alt="Logo {{ $company->name }}">
                    </div>
                    <div>
                        <div class="flex flex-row gap-5 mb-1 mt-4" >
                            <p class="p-1 px-4 min-w-40 text-center">{{ $company->sector }}</p>
                        </div>
                        <div class="flex flex-row gap-5 my-1">
                            @foreach ($company->school_paths as $path)
                                <p class="p-1 px-4 min-w-40 text-center">{{ $path }}</p>
                            @endforeach
                        </div>
                        <p class="pt-4">
                            {{ $company->description }}
                        </p>
                    </div>
                </div>

                <div>
                    <h2>Nos offres de stages</h2>
                    <div>
                        @foreach ($company->offers as $offer)
                            <div class="dark-pink flex flex-col gap-5 mb-5" >
                                <h3>{{ $offer->title }}</h3>
                                <div class="flex flex-row gap-5 mb-5 justify-center" >
                                    @foreach ($offer->school_paths as $path)
                                        <p class="p-1 px-4 min-w-40 text-center">{{ $path->school_path_label }}</p>
                                    @endforeach
                                    @foreach ($offer->school_levels as $level)
                                        <p class="p-1 px-4 min-w-40 text-center">{{ $level->school_level_label }}</p>
                                    @endforeach
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $offer->offer_description }}</p>
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $offer->location }}</p>
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $offer->min_duration }} - {{ $offer->max_duration }} mois</p>
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $offer->date }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="quote-container gray justify-center">
                <img src="{{ $company->logo }}" alt="Logo {{ $company->name }}">
                <div class="">
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->website }}</p>
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->location }}</p>
                </div>
            </div>
        </section>
@endsection


