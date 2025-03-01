@extends('company.layout')

@section('title', 'Profil')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div>
            <h1 class="mt-10 text-center text-3xl font-semibold text-gray-900">
                Mon Profil
            </h1>
        </div>

        <div class="mt-8 max-w-3xl mx-auto">
            <form action="{{ route('company.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="relative">
                    <label for="name" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Nom de l'entreprise</label>
                    <input type="text" id="name" name="name" value="{{ $company->name }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="siret" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">N° de siret</label>
                    <input type="text" id="siret" name="siret" value="{{ $company->siret }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="email" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="description" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Description de l'entreprise</label>
                    <input type="text" id="description" name="description" value="{{ $company->description }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="location" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Localisation</label>
                    <input type="text" id="location" name="location" value="{{ $company->location }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="website" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Site internet</label>
                    <input type="text" id="website" name="website" value="{{ $company->website }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="phone" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">N° de téléphone</label>
                    <input type="text" id="phone" name="phone" value="{{ $company->phone }}" 
                           class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div class="relative">
                    <label for="sector" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Secteur d'activité</label>
                    <select id="sector" name="sector" 
                            class="w-full border rounded-md px-4 py-3 bg-white shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        <option value="">Sélectionnez un secteur d'activité</option>
                        @foreach (\App\Models\Sector::getAllSectors() as $sector)
                            <option value="{{ $sector->sector_id }}" 
                                {{ $company->sector_id == $sector->sector_id ? 'selected' : '' }}>
                                {{ $sector->sector_label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="relative">
                    <label for="logo" class="absolute -top-2.5 left-4 bg-white px-2 text-sm text-gray-600">Logo</label>
                    <div class="border rounded-md px-4 py-3 bg-white shadow-sm">
                        <input type="file" id="logo" name="logo" accept=".svg, .png, .jpg, .jpeg" class="w-full">
                        {{-- @if($company->cv)
                            <div class="mt-2">
                                <a href="{{ asset($company->cv) }}" class="text-pink-600 hover:underline" target="_blank">
                                    Voir le CV actuel
                                </a>
                            </div> 
                        @endif --}}
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
