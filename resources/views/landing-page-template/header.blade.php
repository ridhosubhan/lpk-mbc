<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h6 class="logo"><a href="{{ url('/') }}">LKP Mulya Bhakti Computer<span>.</span></a></h6>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ url('/') }}">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
                <li><a class="nav-link scrollto " href="#galeri">Galeri</a></li>
                <li><a class="nav-link scrollto" href="#cerita-sukses">Cerita Sukses</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                @if (!Auth::user())
                    <li><a class="nav-link" href="{{ url('/daftar') }}">Daftar</a></li>
                    <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                @else
                    <li><a class="nav-link" href="{{ url(Auth::user()->role . '/dashboard') }}">Dashboard</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
