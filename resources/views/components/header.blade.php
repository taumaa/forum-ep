<nav class="nav-container py-4">
  <div class="flex-none">
    <a href="{{ url('/') }}"> <img src="{{ asset('storage/images/logo-esiee.svg') }}" alt="" class="logo-esiee"> </a>
  </div>
  <div class="flex flex-grow justify-end items-center">
    <ul class="flex flex-row">
      <li class="mx-4"><a href="{{ url('/editions-precedentes/2021') }}"> EDITIONS PRECEDENTES </a></li>
      <li class="mx-4"><a href="{{ url('/devis') }}"> DEMANDE DE DEVIS </a></li>
      <li class="mx-4"><a href="{{ url('/exposants') }}"> EXPOSANTS </a></li>
      <li class="mx-4"><a href="{{ url('/offres') }}"> OFFRES </a></li>
      <li class="mx-4"><a href="{{ url('/faq') }}"> FAQ </a></li>
    </ul>
    <div>
      <a href="{{ url('/connexion') }}" class="dark-pink ml-4 text-center p-3"> CONNEXION </a>
    </div>
  </div>
</nav>