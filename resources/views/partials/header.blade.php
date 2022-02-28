<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <img src="{{ asset('img/logo.png') }}" width="40px" hight="40px" />
    <a class="navbar-brand ps-4" href="">YARSI</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-2 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <p class="navbar-brand order-lg-0 me-1 me-lg-0">Jl. Pertahanan RT. 03 RW. 05 Dusun Wonokerto Selatan, Peterongan Jombang </p>

    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}<i class="fas fa-user"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/admin/profile') }}">
                {{ __('Profil') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('admin.spesialis.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                        Spesialis
                    </a>
                    <a class="nav-link" href="{{ route('admin.dokter.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                        Dokter
                    </a>
                    <a class="nav-link" href="{{ route('admin.jadwal.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Jadwal
                    </a>

                    <a class="nav-link" href="{{ route('admin.reservasi.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sticky-note"></i></div>
                        Reservasi
                    </a>

                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User
                    </a>


                </div>

        </nav>
    </div>