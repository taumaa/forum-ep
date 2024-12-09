@extends('layouts.main')

@section('title', 'editions precedentes') <!-- Définir un titre spécifique -->

@section('content')

        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">Les entreprises qui seront présentes</h1>
                @foreach ($exhibitors as $company)
                    <div class="company flex flex-row gap-5 my-4 mx-5">
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
            </div>
        </section>
   

@endsection
