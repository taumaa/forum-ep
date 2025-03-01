<nav id="nav" class="nav-container">
  <div class="flex-none">
    <a href="{{ url('/') }}"> <img src="{{ asset('storage/images/' . $setting->logo) }}" alt="Logo de l'ESIEE" class="logo-esiee pt-4"> </a>
  </div>
  <div class="flex flex-grow justify-end items-center">
    <ul class="flex flex-row">
      <li class="dropdown dropdown-menu mx-4 cursor-pointer"> ÉDITIONS PRÉCÉDENTES
        <ul class=" years absolute">
          @foreach ($years as $year)
          <li class="year"><a class="underline-hover" href="{{ url('/editions-precedentes/'.$year->year) }}">{{$year->year}}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="mx-4"><a href="{{ url('/exposants') }}"> EXPOSANTS </a></li>
      <li class="mx-4"><a href="{{ url('/cvs') }}"> CVS </a></li>
      <li class="mx-4"><a href="{{ url('/faq') }}"> FAQ </a></li>
      <li class="mx-4"><a href="{{ url('/student') }}"> JSP COMPANY</a></li>
    </ul>
    <div>
      <a href="{{ url('/deconnexion') }}" class="dark-pink ml-4 text-center p-3"> DÉCONNEXION </a>
    </div>
  </div>
</nav>


<nav id="nav-responsive" class="flex flex-col">
  <div class="flex flex-row px-5">
    <div class="flex-none">
      <a href="{{ url('/') }}"> <img src="{{ asset('storage/images/' . $setting->logo) }}" alt="Logo de l'ESIEE" class="w-28 pt-4 pb-2"></a>
    </div>
    <div class="flex flex-grow justify-end items-center gap-5">
      <div>
        <a href="{{ url('/connexion') }}" class="dark-pink ml-4 text-center p-3"> CONNEXION </a>
      </div>
      <button id="burger-button" class="w-10 h-10">
        <img src="{{ asset('storage/images/icon-burger-menu.svg') }}" alt="button burger menu">
      </button>
    </div>
  </div> 
  <div>
    <ul id="burger-menu" class="burger-menu-close gray">
      <li class="mx-4"><a href="{{ url('/exposants') }}"> EXPOSANTS </a></li>
      <li class="mx-4"><a href="{{ url('/cvs') }}"> CVS </a></li>
      <li class="mx-4"><a href="{{ url('/faq') }}"> FAQ </a></li>
      <li class="mx-4"><a href="{{ url('/student') }}"> JSP COMPANY</a></li>
    </ul>
  </div>
</nav>