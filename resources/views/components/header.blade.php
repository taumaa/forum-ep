<nav id="nav" class="nav-container">
  <div class="flex-none">
    <a href="{{ url('/') }}"> <img src="{{ asset('storage/images/logo-esiee.svg') }}" alt="Logo de l'ESIEE" class="logo-esiee pt-4"> </a>
  </div>
  <div class="flex flex-grow justify-end items-center">
    <ul class="flex flex-row">
      <li class="dropdown dropdown-menu mx-4 cursor-pointer"> ÉDITIONS PRÉCÉDENTES
      <ul class=" years absolute">
        @foreach ($years as $year)
         <li class="year"><a class="underline-hover" href="{{ url('/editions-precedentes/'.$year->year) }}">{{$year->year}}</a></li>
        @endforeach
      </ul></li>
      <li class="mx-4 "><a href="{{ url('/devis') }}"> DEMANDE DE DEVIS </a></li>
      <li class="mx-4"><a href="{{ url('/exposants') }}"> EXPOSANTS </a></li>
      <li class="mx-4"><a href="{{ url('/offres') }}"> OFFRES </a></li>
      <li class="mx-4"><a href="{{ url('/faq') }}"> FAQ </a></li>
    </ul>
    <div>
      <a href="{{ url('/connexion') }}" class="dark-pink ml-4 text-center p-3"> CONNEXION </a>
    </div>
  </div>
</nav>