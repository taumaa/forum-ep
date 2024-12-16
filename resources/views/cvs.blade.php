@extends('layouts.main')

@section('title', 'cvs') <!-- Définir un titre spécifique -->

@section('content')
    @vite(['resources/js/cvs-filters.js'])

    <section class="container">

        <div id="filters-container" class="filters-container w-full gray py-3">
            <div class="filters flex flex-row gap-5">
                <input type="search" id="cvs-search" name="q" class="w-[15rem]" placeholder="Rechercher un étudiant..."/>
                <select id="paths" name="paths">
                <option value="">--Filieres--</option>
                    @foreach ($all_paths as $path)
                        <option value="{{ $path->school_path_label }}">{{ $path->school_path_label }}</option>
                    @endforeach
                </select>
                <select id="levels" name="levels">
                <option value="">--Niveaux--</option>
                    @foreach ($all_levels as $level)
                        <option value="{{ $level->school_level_label }}">{{ $level->school_level_label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h1>CVs de nos étudiants</h1>

        <div class="flex flex-row flex-wrap my-2">
            @foreach ($students as $student)
                <a href="{{ asset('storage/cvs/cv-anne-passelegue.pdf') }}" target="_blank">
                    <div class="flex flex-column flex-wrap cv-text-hover items-center justify-center mx-8 my-5">
                        <iframe src="{{ asset('storage/cvs/cv-' . strtolower($student->first_name) . '-' . strtolower($student->last_name) . '.pdf#zoom=10') }}" style="pointer-events: none" width="201 " height="283"></iframe>
                        <p class="text-center">{{ $student->first_name }} <br> {{ $student->last_name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
