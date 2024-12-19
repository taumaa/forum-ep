@extends('layouts.main')

@section('title', 'cvs') <!-- Définir un titre spécifique -->

@section('content')
    @vite(['resources/js/cvs-filters.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <section class="container">

        <div id="filters-container" class="filters-container w-full gray py-3 flex justify-between">
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
            <button id="download-cvs" name="download-cvs">Télécharger ma sélection</button>
        </div>

        <h1>CVs de nos étudiants</h1>

        <div id="cv-container" class="flex flex-row flex-wrap my-10">
            @foreach ($students as $student)
                @php
                    $cvPath = storage_path('app/public/cvs/cv-' . strtolower($student->first_name) . '-' . strtolower($student->last_name) . '.pdf');
                    $cvUrl = file_exists($cvPath) ? asset('storage/cvs/cv-' . strtolower($student->first_name) . '-' . strtolower($student->last_name) . '.pdf') : null;
                @endphp
                @if ($cvUrl)
                    <a href="{{ $cvUrl }}" target="_blank" class="cv cv-block mx-8 my-5" data-name="{{ $student->first_name . ' ' . $student->last_name }}" data-path="{{ $student->schoolPath->school_path_label }}" data-level="{{ $student->schoolLevel->school_level_label }}" data-pdf="{{ $student->first_name . '-' . $student->last_name }}">
                    <div class="flex flex-column flex-wrap cv-text-hover items-center justify-center">
                        <div id="pdf-container-{{ $student->student_id }}" class="border border-black"></div>
                        <p class="text-center">{{ $student->first_name }} <br> {{ $student->last_name }}</p>
                    </div>
                    </a>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // URL du CV pour chaque étudiant
                        const studentUrl = "{{ asset('storage/cvs/cv-' . strtolower($student->first_name) . '-' . strtolower($student->last_name) . '.pdf') }}";

                        // Vérification de l'existence du fichier via Fetch API
                        fetch(studentUrl, { method: 'HEAD' })
                            .then(response => {
                                if (response.ok) {
                                    // Si le fichier existe, on charge le PDF avec PDF.js
                                    loadPDF(studentUrl, '{{ $student->student_id }}');
                                }
                            })
                            .catch(error => {
                                console.error('Erreur lors de la vérification du fichier PDF: ', error);
                            });
                    });

                    function loadPDF(pdfUrl, studentId) {
                        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                            pdf.getPage(1).then(function(page) {
                                const scale = 0.33; // Ajuste le zoom
                                const viewport = page.getViewport({ scale: scale });

                                const canvas = document.createElement('canvas');
                                const container = document.getElementById('pdf-container-' + studentId);
                                
                                if (container) {
                                    container.appendChild(canvas);

                                    const context = canvas.getContext('2d');
                                    canvas.height = viewport.height;
                                    canvas.width = viewport.width;

                                    page.render({
                                        canvasContext: context,
                                        viewport: viewport
                                    });
                                }
                            });
                        }).catch(function(error) {
                            console.error('Erreur lors du chargement du PDF: ', error);
                        });
                    }
                </script>
                @endif
            @endforeach
        </div>
    </section>

<script>
    const button = document.getElementById("download-cvs");

    button.addEventListener("click", function () {

        const students = document.querySelectorAll('.cv');

        let names = []
        console.log(students)

        // On récupère les noms des étudiants qui sont affichés après filtrage
        students.forEach (student => {
            if (student.style.display != 'none') {
                names.push('cv-' + student.getAttribute('data-pdf').toLowerCase() + '.pdf');
            }
        })

        fetch("{{ route('download-all-cvs') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ names }) // Envoyer la liste de noms
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erreur lors du téléchargement");
                }
                return response.blob(); // Récupérer la réponse en tant que fichier binaire (blob)
            })
            .then(blob => {
                // Créer un lien de téléchargement pour le fichier ZIP
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.download = "cvs_etudiants_esiee.zip"; // Nom du fichier à télécharger
                document.body.appendChild(a);
                a.click();
                a.remove();
            })
            .catch(error => console.error("Erreur:", error));
    });
</script>

@endsection

