<!DOCTYPE html>
<html lang="en">

    @include('components.head') <!-- Inclusion du fichier head -->
    <title>@yield('title', 'Titre par défaut')</title>

<body class="font-quicksand">

    @include('components.header') <!-- Inclusion du header -->

    <main>
        @yield('content') <!-- Zone où le contenu des pages s'insère -->
    </main>

    @include('components.footer') <!-- Inclusion du footer -->
</body>

</html>