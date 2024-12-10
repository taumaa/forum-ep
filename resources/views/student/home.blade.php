@extends('student.layout')

@section('content')
    <h1>Hello {{ $student->first_name }} {{ $student->last_name }}</h1>
@endsection
