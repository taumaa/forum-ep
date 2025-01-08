@extends('layouts.main')

@section('title', 'editions precedentes') <!-- Définir un titre spécifique -->

@section('content')

        @vite(['resources/js/forum-edition-filters.js' ])
        
        <div class="white company-list">
            <img src="{{ asset('storage/images/ESIEE-Home-Main-Picture.webp') }}" alt="">
            <div id="companies-list" class="container">
                <div id="filters-container" class="filters-container w-full gray py-3">
                    <div class="filters flex flex-row gap-5">
                        <input type="search" id="companies-search" name="companies-search" placeholder="Rechercher une entreprise..."/>
                        <select id="paths" name="paths">
                            <option value="">--Filieres--</option>
                            @foreach ($all_paths as $path)
                                <option value="{{ $path->school_path_label }}">{{ $path->school_path_label }}</option>
                            @endforeach
                        </select>
                        <select id="sectors" name="sectors">
                            <option value="">--Secteurs--</option>
                            @foreach ($all_sectors as $sector)
                                <option value="{{ $sector->sector_label }}">{{ $sector->sector_label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h1 class="mb-5 mt-28">Les entreprises ayant participé en {{ $year }}</h1>

                @if (!$companies->isEmpty())
                    @foreach ($companies as $company)
                        <div class="company flex flex-row gap-5 my-4 gray p-5" data-paths="{{ implode(',', $company->school_paths) }}"
                            data-sectors="{{ $company->sector }}"
                            data-name="{{ $company->name }}">
                            <div class="logos-companies-div">
                                <img src="{{ asset('storage/company-logos/' . $company->logo) }}" alt="Logo {{ $company->name }}" class="logos-companies">
                            </div>
                            <div>
                                <a href="{{ url('/exposants/' . $company->company_id) }}"><h2 class="underline-hover">{{ $company->name }}</h2></a>
                                <div class="flex flex-row gap-5 mb-1 mt-4 mb-2" >
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $company->sector }}</p>
                                </div>
                                <div class="flex flex-row flex-wrap my-1">
                                    @foreach ($company->school_paths as $path)
                                        <p class="p-1 px-4 min-w-40 mb-1 mr-1 text-center">{{ $path }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="p-1 px-4 min-w-40 mt-10">Aucune entreprise enregistrée</p>
                @endif
            </div>
        </div>
   

@endsection
