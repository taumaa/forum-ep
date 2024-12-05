@extends('layouts.main')

@section('title', 'editions precedentes') <!-- Définir un titre spécifique -->

@section('content')
        <section> 
            <img src="{{ asset('storage/images/ESIEE-Home-Main-Picture.webp') }}" alt="">
        </section>

        <section class="white"> 
            <div class="container">
                <h1 class="mb-3">Les entreprises ayant participées en {{ $year }}</h1>
                @foreach ($companies as $company)
                    <div class="company flex flex-row gap-5 my-4 mx-5">
                        <div>
                            <img src="{{ $company->logo }}" alt="Logo {{ $company->name }}">
                        </div>
                        <div>
                            <a href="{{ url('/exposants/' . $company->company_id) }}"><h2>{{ $company->name }}</h2></a>
                            <div class="flex flex-row gap-5 mb-1 mt-4" >
                                <p class="p-1 px-4 min-w-40 text-center">{{ $company->sector }}</p>
                            </div>
                            <div class="flex flex-row gap-5 my-1">
                                @foreach ($company->school_paths as $path)
                                    <p class="p-1 px-4 min-w-40 text-center">{{ $path }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
   

@endsection
