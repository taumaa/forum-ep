<!DOCTYPE html>
<html lang="fr">

    @include('components.head') <!-- Inclusion du fichier head -->
    <title>@yield('admin', 'Administrer le site')</title>

<body class="font-quicksand">

    @include('components.admin.header') <!-- Inclusion du header -->

    <main>
        @yield('content') <!-- Zone où le contenu des pages s'insère -->
    </main>
</body>

    @include('components.footer') <!-- Inclusion du footer -->

</html>