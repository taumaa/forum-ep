@extends('layouts.main')

@section('title', 'editions precedentes') <!-- Définir un titre spécifique -->

@section('content')

    @vite(['resources/js/exhibitors-filters.js' ])

        <div class="white company-list"> 
            <div class="container gap-5 mx-5">
                <div id="filters-container" class="filters-container w-screen gray py-3">
                    <div class="filters flex flex-row gap-5">
                        <input type="search" id="companies-search" name="companies-search" onchange="scrollToOffers()" placeholder="Recherhcer une entreprise..."/>
                        <select id="paths" onchange="scrollToOffers()" name="paths">
                            <option value="">--Filieres--</option>
                            @foreach ($all_paths as $path)
                                <option value="{{ $path->school_path_label }}">{{ $path->school_path_label }}</option>
                            @endforeach
                        </select>
                        <select id="sectors" onchange="scrollToOffers()" name="sectors">
                            <option value="">--Secteurs--</option>
                            @foreach ($all_sectors as $sector)
                                <option value="{{ $sector->sector_label }}">{{ $sector->sector_label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <h1 class="mb-5 mt-28">Les entreprises qui seront présentes</h1>
                <div>
                    @if (!$exhibitors->isEmpty())
                        @foreach ($exhibitors as $company)
                        <div class="company flex flex-row gap-5 my-4 gray p-5"
                                data-paths="{{ implode(',', $company->school_paths) }}"
                                data-sectors="{{ $company->sector }}"
                                data-name="{{ $company->name }}">
                            <div>
                                <img src="{{ asset('storage/company-logos/' . $company->logo) }}" class="logos-companies" alt="Logo {{ $company->name }}">
                            </div>
                            <div>
                                <h2>{{$company->name}}</h2> 
                                <div class="flex flex-row gap-5 mb-1 mt-4" >
                                    <p class="p-1 px-4 min-w-40 text-center">{{$company->sector}}</p>
                                </div>
                                <div class="flex flex-row gap-5 my-1">
                                    @foreach ($company->school_paths as $path)
                                        <p class="p-1 px-4 min-w-40 text-center">{{ $path }}</p>
                                    @endforeach
                                </div>
                                <p class="pt-4 line-clamp-3">
                                    {{ $company->description }}
                                </p>
                                <a href="{{ url('/exposants/' . $company->company_id) }}" class="flex flex-row gap-5 mb-1 mt-4" ><p class="p-1 px-4 min-w-38 text-center">Voir plus ></p></a>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="p-1 px-4 min-w-40 mt-10">Aucune entreprise enregistrée</p>
                    @endif
                </div>
            </div>
        </div>
   

@endsection
