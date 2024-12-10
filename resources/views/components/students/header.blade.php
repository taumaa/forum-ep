<nav class="nav-container py-4">
  <div class="flex-none">
    <a href="{{ url('/') }}"> <img src="{{ asset('storage/images/logo-esiee.svg') }}" alt="" class="logo-esiee"> </a>
  </div>
  <div class="flex flex-grow justify-end items-center">
    <ul class="flex flex-row">
      <li class="mx-4"><a href="{{ url('/student') }}"> JSP STUDENT</a></li>
    </ul>
    <div>
      <a href="{{ url('/deconnexion') }}" class="dark-pink ml-4 text-center p-3"> DECONNEXION </a>
    </div>
  </div>
</nav>