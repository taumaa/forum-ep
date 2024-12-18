@extends('student.layout')

@section('title', 'Profil')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-bold">
            Bonjour {{ $student->first_name }} {{ $student->last_name }}
        </h1>
    </div>
@endsection
