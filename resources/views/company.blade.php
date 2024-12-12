@extends('layouts.main')

@section('title', 'entreprise') <!-- Définir un titre spécifique -->

@section('content')
        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">{{ $company->name }}</h1>
                <div class="company flex flex-row gap-5 my-4 mx-5">
                    <div>
                        <img src="{{ asset('storage/company-logos/' . $company->logo) }}" class="logos-companies" alt="Logo {{ $company->name }}">
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
                    <h2 class="mb-5">Nos offres de stages</h2>
                    <div class="company-offer">
                        @foreach ($company->offers as $offer)
                            <div class="gray flex flex-col gap-1 mb-5 p-6" >
                                <h3 class="pl-11">{{ $offer->title }}</h3>
                                <div class="flex flex-row flex-wrap mb-1 mt-2 pl-11" >
                                    @foreach ($offer->school_paths as $path)
                                        <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $path->school_path_label }}</p>
                                    @endforeach
                                    @foreach ($offer->school_levels as $level)
                                        <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $level->school_level_label }}</p>
                                    @endforeach
                                </div>
                                <div class="flex flex-row flex-wrap my-1 pl-11">
                                    <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $offer->location }}</p>
                                    <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $offer->min_duration }} - {{ $offer->max_duration }} mois</p>
                                    <p class="p-1 px-4 min-w-40 mr-1 mt-1 text-center">{{ $offer->date }}</p>
                                </div>
                                <a href="" class="min-w-40 mr-1 mt-1 pl-11 underline-hover">Retrouver l'offre ici : {{ $offer->offer_description }} </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="quote-container light-blue justify-center items-center">
                <img src="{{ asset('storage/company-logos/' . $company->logo) }}" class="logos-companies" alt="Logo {{ $company->name }}">
                <div class="">
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->website }}</p>
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->location }}</p>
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->email }}</p>
                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->phone }}</p>
                </div>
            </div>
        </section>
@endsection


