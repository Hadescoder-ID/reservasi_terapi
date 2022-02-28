<div class="container d-flex align-items-center">

  <a href="{{ url('/user/home') }}" class="logo mr-auto"><img src="{{ asset('img/logo.png') }}" alt=""> YARSI</a>
  <!-- Uncomment below if you prefer to use an image logo -->
  <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

  <nav class="nav-menu d-none d-lg-block">
    <ul>
      <li class="active"><a href="{{ url('/user/home') }}">Home</a></li>
      <li><a href="{{ url('/user/jadwal') }}">Jadwal</a></li>
      <li><a href="{{ url('/user/reservasi') }}">Reservasi</a></li>

      <li class="drop-down"><a href=""> Setting</a>
        <ul>
          <li>
            <a href="{{ url('/user/profile') }}">Profil </a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              {{ ('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>


    </ul>
  </nav><!-- .nav-menu -->


</div>