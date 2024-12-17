@extends('student.layout')

@section('title', 'Profil')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div>
            <h1 class="mt-10 text-center text-3xl font-semibold text-gray-900">
                Mon Profil
            </h1>
        </div>

        <div class="mt-8 max-w-3xl mx-auto">
            <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="relative">
                    <label for="first_name" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Prénom</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="last_name" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Nom</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="email" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="school_level_id" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Niveau d'études</label>
                    <select id="school_level_id" name="school_level_id" 
                            class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        <option value="">Sélectionnez un niveau</option>
                        @foreach (\App\Models\School_level::getAllSchoolLevels() as $level)
                            <option value="{{ $level->school_level_id }}" 
                                {{ $student->school_level_id == $level->school_level_id ? 'selected' : '' }}>
                                {{ $level->school_level_label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="relative">
                    <label for="school_path_id" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Filière</label>
                    <select id="school_path_id" name="school_path_id" 
                            class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        <option value="">Sélectionnez une filière</option>
                        @foreach (\App\Models\School_path::getAllSchoolPaths() as $path)
                            <option value="{{ $path->school_path_id }}" 
                                {{ $student->school_path_id == $path->school_path_id ? 'selected' : '' }}>
                                {{ $path->school_path_label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="relative">
                    <label for="abroad" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Intéressé par l'international</label>
                    <select id="abroad" name="abroad" 
                            class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        <option value="0" {{ !$student->abroad ? 'selected' : '' }}>Non</option>
                        <option value="1" {{ $student->abroad ? 'selected' : '' }}>Oui</option>
                    </select>
                </div>

                <div class="relative">
                    <label for="cv" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">CV</label>
                    <div class="border rounded-md px-4 py-3 bg-white shadow-sm">
                        <input type="file" id="cv" name="cv" accept=".pdf" class="w-full">
                        @if($student->cv)
                            <div class="mt-2">
                                <a href="{{ asset($student->cv) }}" class="text-pink-600 hover:underline" target="_blank">
                                    Voir le CV actuel
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-4 rounded-md">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-50 text-green-500 p-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-center items-center py-5">
                    <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-md hover:bg-pink-700 transition-colors duration-200">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
