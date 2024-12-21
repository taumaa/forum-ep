@extends('admin.layout')

@section('content')

    <div class="container my-8 admin-faq">

        @if (isset($faq) && $faq)

            <h1>Modifier la question / réponse</h1>

            <form method="POST" action="/editer-faq/{{ $faq->faq_id }}">
                @csrf
                <div class="form-group mt-6">
                    <label for="question" class="white mb-2 ml-4 px-3">Question :</label>
                    <input type="text" id="question" name="question" value="{{ $faq->question }}">
                    <input type="hidden" name="id" value="{{ $faq->faq_id }}">
                </div>

                <div class="form-group mt-6">
                    <label for="answer" class="white mb-2 ml-4 px-3">Réponse :</label>
                    <textarea id="answer" name="answer">{{ $faq->answer }}</textarea>
                </div>

                <input type="submit" value="Enregistrer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @else

            <h1>Nouvelle question / réponse</h1>

            <form method="POST" action="/creer-faq">
                @csrf
                <div class="form-group mt-6">
                    <label for="question" class="white mb-2 ml-4 px-3">Question :</label>
                    <input type="text" id="question" name="question">
                </div>

                <div class="form-group mt-6">
                    <label for="answer" class="white mb-2 ml-4 px-3">Réponse :</label>
                    <textarea id="answer" name="answer"></textarea>
                </div>

                <input type="submit" value="Créer" class="button-color border-2 px-6 py-2 ml-7 mt-10">
            <form>

        @endif
        
    </div>

@endsection
